<?php

$modalViewFileTitle = "Detalles del archivo";
$modalViewFileTitleSubtitle = "No definido ---";
$inputNewFolder = '<input type="text" class="form-control" name="newFolder" required>';
$inputNewFile = '<input type="file" name="fileToUpload" required>';
$inputNewUploads = '<input type="file" class="form-control" id="multipleFiles[]" name="multipleFiles[]" multiple="">';

$modalViewFile = '
<!-- Modal -->
<div class="modal fade" id="modal-details-file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-body">
        
        <!-- header -->
        <div class="d-flex justify-content-between align-items-center">
            <h2 id="exampleModalLabel">'.$modalViewFileTitle.'</h2>
            <button type="button" class="close btn-sm btn-dark" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>    
        </div>
        <h5>'.$modalViewFileTitleSubtitle.'</h5>
        <hr />

        <!-- contenido -->
        <div id="modal-details-file-body">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><i class="fa fa-arrow-left mr-2"></i> cerrar</button>        
      </div>
    </div>
  </div>
</div>
';

function modalFolderNew($modalName, $modalTitle, $inputName, $buttonName, $changeFolderNew) {
echo '
  <div class="modal fade" id="'.$modalName.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">'.$modalTitle.' </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body"> 
                              <form action="index.php" method="post" enctype="multipart/form-data">                                  
                                  <div id="output1" class="form-group">
                                      <input type="hidden" name="user" value="'.$_COOKIE['User'].'"/>
                                      <input type="hidden" name="password" value="'.$_COOKIE['Pass'].'"/>
                                      <input type="hidden" name="host" value="'.$_COOKIE['Host'].'"/>
                                      <input type="hidden" name="workgroup" value="'.$_COOKIE['Work'].'"/>
                                      <input type="hidden" name="share" value="'.$_COOKIE['Folder'].'"/>
                                      <input type="hidden" name="changeFolder" value="'.$changeFolderNew.'"/>
                                      '.$inputName.'
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                      <button class="btn btn-success">'.$buttonName.'</button>
                                  </div>
                              </form>
                      </div>        
                  </div>
              </div>
          </div>
  ';
}