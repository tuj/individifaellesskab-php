<?php
// Only allow cli
if (php_sapi_name() == 'cli') {
    include_once 'iif_db.php';
    $db = new IIFdb();

    $db->updateLists();
}
