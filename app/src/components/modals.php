<?php

$modalViewFileTitle = "Detalles del archivo";
$modalViewFileTitleSubtitle = "No definido ---";

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