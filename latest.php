<?php
include_once dirname(__FILE__) . '/db/iif_db.php';
$db = new IIFdb();

$items = [
    'we' => $db->getLatest('items_we', 50),
    'i' => $db->getLatest('items_i', 50),
];

echo json_encode($items);
