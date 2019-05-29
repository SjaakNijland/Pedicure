window.addEventListener('load', function() {

    function decode_utf8(s) {
        return decodeURIComponent(escape(s));
    }

    var edit = document.getElementById("backupEdit");
    var save = document.getElementById("backupSave");
    var cancel = document.getElementById("backupCancel");

    var name = window.location.pathname.split("/").pop();

    if (name == "admin"){
        name = "home";
    }

    function clearBackupStyle(){
        var div = document.getElementsByTagName("div");
        for (var i = 0; i < div.length; i++) {
            if (div[i].getAttribute('data-name')) {
                div[i].style.border = "none";
            }
        }

        var selects = document.getElementsByClassName("selectBack");
        for (var i = selects.length; i > 0; i--) {
            selects[i-1].remove();
            //selects[i].style.display = "none";
            //selects[i].parentNode.removeChild(selects[i]);
        }
    }
    edit.style.display = "block";

    edit.addEventListener("click", editB);

    function editB(){
        console.log("%cEdit", "color: blue");

        showOptions();

        var div = document.getElementsByTagName("div");
        var divs = [];
        for (var i = 1; i < div.length; i++) {

            if (div[i].getAttribute('data-name')) {
                divs.push(div[i]);
            }
        }

        var selectedOld = [];
        //var deletedSelect = [];
        //var deletedId = [];


        xhr = new XMLHttpRequest();
        xhr.addEventListener('load', function (result) {
            if (parseInt(result.target.status) == 200) {
                //console.log(result.target.responseText);
                var data = JSON.parse(result.target.responseText);
                console.log(data);

                var sorted = {};

                for (var i = 0; i < data.length; i++) {
                    if (!sorted[data[i].content_id]) {
                        sorted[data[i].content_id] = [];
                    }
                    sorted[data[i].content_id].push(data[i]);
                }

                console.log(sorted);

                for (var i = 0; i < divs.length; i++) {
                    divs[i].style.border = "2px solid yellow";

                    var optionsDate = "";

                    var backup = sorted[divs[i].getAttribute('data-name').replace(/[^0-9]*/g, '')];

                    if (backup.length > 1) {
                        for (var j = 0; j < backup.length; j++) {
                            if (divs[i].innerHTML.trim() == backup[j]['body']) {
                                optionsDate += '<option class="backup-option" selected value="' + backup[j]['id'] + '">' + backup[j]['date'] + '</option>';
                                selectedOld.push(backup[j]['id']);
                            } else {
                                optionsDate += '<option class="backup-option" value="' + backup[j]['id'] + '">' + backup[j]['date'] + '</option>';
                            }
                        }

                        divs[i].insertAdjacentHTML('afterend', '<select id="option[' + (backup[0]['content_id']) + ']" class="selectBack">' + optionsDate + '</select>');
                    //<button id="del[' + (backup[0]['content_id']) + ']" class="delBack">Verwijder</button>
                        document.getElementById("option[" + (backup[0]['content_id']) + "]").addEventListener("change", changeData);
                        //document.getElementById("del[" + (backup[0]['content_id']) + "]").addEventListener("click", deleteBackup);

                    }
                }

                //function deleteBackup(e) {
                //    console.log(selectedOld);
                //    console.log(e.target.previousSibling.id);
                //    //deleted.push(e.target.id.replace(/[^0-9]*/g, ''), e.target.previousSibling.selectedIndex);
                //    deletedSelect.push(e.target.id.replace(/[^0-9]*/g, ''));
                //    deletedId.push(e.target.previousSibling[e.target.previousSibling.selectedIndex].value);
                //    //deleted[e.target.id.replace(/[^0-9]*/g, '')] = e.target.previousSibling.selectedIndex;
                //    //console.log(e.target.previousSibling.selectedIndex);
                //    //console.log(e.target.id.replace(/[^0-9]*/g, ''));
                //    //console.log(deleted);
                //    //console.log(e.target.previousSibling[e.target.previousSibling.selectedIndex].value);
                //    //e.target.previousSibling[e.target.previousSibling.selectedIndex].style.display = "none";
                //    e.target.previousSibling.remove(e.target.previousSibling.selectedIndex);
                //}

                function changeData(e) {
                    var div_id = e.target.id.replace(/[^0-9]*/g, '');
                    e.target.previousSibling.innerHTML = decode_utf8(sorted[div_id][e.target.selectedIndex]['body']);
                }


            }
        });
        xhr.open('GET', 'model/ct-backup.php?name=' + name, true);
        xhr.send();


        save.addEventListener("click", saveB);
        function saveB(){
            console.log("%cSaved", "color: green");

            var selects = document.getElementsByClassName("selectBack");
            var updatedBackups = {};
            //var deletedBackups = {};

            for (var i = 0; i < selects.length; i++) {
                if (selects[i].value != selectedOld[i]) {
                    updatedBackups[selects[i].id.replace(/[^0-9]*/g, '')] = selects[i].value;
                }
            }
            //for (var j = 0; j < deletedSelect.length; j++){
            //    deletedBackups[deletedSelect[j]] = deletedId[j];
            //}

            //console.log(updatedBackups);
            //console.log(deletedBackups);
            //console.log(deletedSelect);
            //console.log(deletedId);


            xhr = new XMLHttpRequest();
            xhr.addEventListener('load', function (result) {
                if (parseInt(result.target.status) == 200) {
                    console.log(result.target.responseText)
                }
            });

            xhr.open("POST", "model/ct-backup.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("updatedBackups=" + JSON.stringify(updatedBackups));

            clearBackupStyle();

            hideOptions();
            save.removeEventListener("click", saveB);
        }

        cancel.addEventListener("click", function(){
            console.log("%cCancel", "color: red");

            clearBackupStyle();

            hideOptions();
            save.removeEventListener("click", saveB);
        });
        edit.removeEventListener("click", editB);
        edit.addEventListener("click", editB);
    }

    function showOptions(){
        edit.style.display = "none";
        save.style.display = "block";
        cancel.style.display = "block";
        document.getElementsByClassName("ct-app")[0].style.display = "none";
    }

    function hideOptions(){
        edit.style.display = "block";
        save.style.display = "none";
        cancel.style.display = "none";
        document.getElementsByClassName("ct-app")[0].style.display = "block";
    }

});