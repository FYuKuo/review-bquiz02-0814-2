<?php
include('./base.php');
if(isset($_POST['del'])){
    foreach ($_POST['del'] as $key => $id) {
        $Admin->del($id);
    }
}
?>