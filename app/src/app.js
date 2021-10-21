function readContentFile(content) {

    const body = document.getElementById('modal-details-file-body');

    body.innerHTML = atob(content);
}

// Recarga la pagina una sola vez para guardar las cookies en los values
window.onload = function() {
     if( window.localStorage ) {
        if(!localStorage.getItem('firstLoad')) {
        localStorage['firstLoad'] = true;
        if (localStorage['firstLoad'] = true){
            window.location.reload();
            }
        }
    }
    let alert = document.getElementById('alertFolderId');

    if (alert) {
        setTimeout(function(){ 
            let mainAlert = alert.parentNode;
            mainAlert.removeChild(alert);
        }, 6000);
    }
}
// Borra las variables creadas en local
function cleanerStorage() {
    localStorage.removeItem('firstLoad');
    document.cookie = "User=; max-age=0";
    document.cookie = "Pass=; max-age=0";
    document.cookie = "Host=; max-age=0";
    document.cookie = "Work=; max-age=0";
    document.cookie = "Folder=; max-age=0";
}

function onToggle(checkbox) {
    if(checkbox.checked){
        let input = document.createElement("input");
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'downloadFiles[]');
        input.setAttribute('value', checkbox['id']);
        input.setAttribute('id', checkbox['id']);

        let parent = document.getElementById("selectedFileList");
        parent.appendChild(input);

        let inputInfo = document.createElement("input");
        inputInfo.setAttribute('type', 'hidden');
        inputInfo.setAttribute('name', 'fileNameInfo');
        inputInfo.setAttribute('value', checkbox['id']);

        let parentInfo = document.getElementById("selectedFileInfo");
        
        if($('#selectedFileInfo').find("input").length){
            parentInfo.removeChild(parentInfo.childNodes[0]);
            parentInfo.appendChild(inputInfo);        
        }else{
            parentInfo.appendChild(inputInfo);
        }

    } else {     
        let removeSelected = document.getElementById(checkbox['id']);
        removeSelected.remove();

    }
}

$(document).ready(function(){
    document.querySelector("#btn-grid").onclick = () => {
        $("tbody").toggleClass("wrapper");
        $("thead").toggleClass("hidden-visual");
        $(".fa-list-ul").toggleClass("hidden-visual");
        $(".fa-grip-horizontal").toggleClass("hidden-visual");

        document.querySelectorAll("tr").forEach((e) =>{
            e.classList.toggle("wrapper-child");
        })
        document.querySelectorAll("i.fas.fa-folder.text-success").forEach((e) => {
            e.classList.toggle("folfer-icon");
        })
        document.querySelectorAll("i.fas.fa-file.text-warning").forEach((e) => {
            e.classList.toggle("folfer-icon");
        })
        document.querySelectorAll(".hiddenGrid").forEach((e) => {
            e.classList.toggle("hidden-visual");
        })    
        document.querySelectorAll("button.btn-hidden").forEach((e) => {
            e.classList.toggle("files-width");
        })
    };
});