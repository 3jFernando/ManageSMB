function readContentFile(content) {

    const body = document.getElementById('modal-details-file-body');

    body.innerHTML = atob(content);
}