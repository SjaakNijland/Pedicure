window.addEventListener('load', function() {

    document.getElementById("backupEdit").addEventListener("click", function(){
        console.log("Edit started");

        var name = "home";
        var div = document.getElementsByTagName("div");
        var divs = [];
        for(var i = 1; i < div.length; i++) {

            if (div[i].getAttribute('data-name')) {
                divs.push(div[i]);
            }
        }

        var selectedOld = [];

        xhr = new XMLHttpRequest();
        xhr.addEventListener('load', function(result){
            if (parseInt(result.target.status) == 200) {
                var data = JSON.parse(result.target.responseText);
                //console.log(data);

                var sorted = {};

                for (var i = 0; i < data.length; i++){
                    if (!sorted[data[i].content_id]){
                        sorted[data[i].content_id] = [];
                    }
                    sorted[data[i].content_id].push(data[i]);
                }

                console.log(sorted);

                for(var i = 0; i < divs.length; i++){
                    divs[i].style.border = "3px solid yellow";

                    var optionsDate = "";

                    var backup = sorted[divs[i].getAttribute('data-name').replace(/[^0-9]*/g,'')];

                    for (var j = 0; j < backup.length; j++) {
                        if (divs[i].innerHTML.trim() == backup[j]['body']) {
                            optionsDate += '<option class="backup-option" selected value="' + backup[j]['id'] + '">' + backup[j]['date'] + '</option>';
                            selectedOld.push(backup[j]['id']);
                        } else {
                            optionsDate += '<option class="backup-option" value="' + backup[j]['id'] + '">' + backup[j]['date'] + '</option>';
                        }
                    }

                    divs[i].insertAdjacentHTML('afterend', '<select id="option['+(backup[0]['content_id'])+']" class="selectBack">' + optionsDate + '</select>');

                    document.getElementById("option["+(backup[0]['content_id'])+"]").addEventListener("change", changeData);
                }

                function changeData(e){
                    //console.log(e);
                    //console.log(e.target[e.target.options[e.target.selectedIndex].index]);
                    //console.log("Target id: " + e.target.id);
                    //console.log("Value: " + e.target[e.target.options[e.target.selectedIndex].index].value);

                    var div_id = e.target.id.replace(/[^0-9]*/g,'');

                    e.target.previousSibling.innerHTML = sorted[div_id][e.target.selectedIndex]['body'];
                }

            }
        });
        xhr.open('GET', 'model/ct-backup.php?name='+name, true);
        xhr.send();


        document.getElementById("backupSave").addEventListener("click", function () {
            console.log("Saved");

            var selects = document.getElementsByClassName("selectBack");

            var updatedBackups = {};

            for (var i = 0; i < selects.length;i++){
                if(selects[i].value != selectedOld[i]){
                    updatedBackups[selects[i].id.replace(/[^0-9]*/g,'')] = selects[i].value;
                }
            }

            console.log(updatedBackups);

            xhr = new XMLHttpRequest();
            xhr.addEventListener('load', function(result){
                if (parseInt(result.target.status) == 200) {
                    console.log(result.target.responseText)
                }
            });

            xhr.open("POST", "model/ct-backup.php");
            //xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("updatedBackups=" + JSON.stringify(updatedBackups));
        });
    });
});