<?php
$alertIconCheck = '<i class="fas fa-check-circle pr-3">';
$alertIconDanger = '<i class="fas fa-exclamation-triangle pr-3"></i>';

function notificationAlert($classAlert, $alertIcon, $newAlertMessage) {
    echo '
    <div id="alertFolderId" class="alert '.$classAlert.'" role="alert">
        '.$alertIcon.'</i>'.$newAlertMessage.'
    </div>
    ';
}