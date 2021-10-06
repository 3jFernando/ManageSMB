function readContentFile(content) {

    const body = document.getElementById('modal-details-file-body');

    body.innerHTML = atob(content);
}

window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}