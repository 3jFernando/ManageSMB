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
        }, 5000);
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

        console.log('checked');
    } else {     
        let removeSelected = document.getElementById(checkbox['id']);
        removeSelected.remove();

        console.log('unchecked');
    }
}