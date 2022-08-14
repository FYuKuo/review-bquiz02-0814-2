<?php
include('./base.php');
$res = $News->find($_GET['id']);

echo json_encode($res);
?>