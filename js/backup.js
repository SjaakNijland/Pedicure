window.addEventListener('load', function() {
    var backup = document.getElementById("backupEdit");
    console.log(backup);
    backup.addEventListener("click", function(){
        console.log("Edit started");

        var name = "home";
        var div = document.getElementsByTagName("div");
        var divs = [];
        for(var i = 1; i < div.length; i++) {

            if (div[i].getAttribute('data-name')) {
                divs.push(div[i]);
            }
        }

        xhr = new XMLHttpRequest();
        xhr.addEventListener('load', function(result){
            if (parseInt(result.target.status) == 200) {
                var data = JSON.parse(result.target.responseText);
                console.log(data);

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

                    console.log(divs[i].getAttribute('data-name'));
                    var optionsDate = "";

                    for (var j = 0; j < sorted[i+1].length; j++){
                        optionsDate += '<option value="'+ sorted[i+1][j]['id'] +'">' + sorted[i+1][j]['date'] + '</option>';
                    }
                    divs[i].insertAdjacentHTML('afterend', '<select id="option['+(i+1)+']">' + optionsDate + '</select>');

                    var select = document.getElementById("option["+(i+1)+"]");
                    select.addEventListener("change", changeData);

                    //document.getElementById("option["+(i+1)+"]").addEventListener("change", changeData);
                }

                function changeData(e){
                    console.log(e);
                    console.log(e.target[e.target.options[e.target.selectedIndex].index]);
                    console.log(e.target[e.target.options[e.target.selectedIndex].index].value);


                }

            }
        });
        xhr.open('GET', 'model/ct-backup.php?name='+name, true);
        xhr.send();
    });

});