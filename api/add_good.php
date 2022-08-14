<?php
include('./base.php');
if($_POST['type'] == 1){

    $Log->save(['user'=>$_SESSION['user'],'news_id'=>$_POST['id']]);

}else{

    $Log->del(['user'=>$_SESSION['user'],'news_id'=>$_POST['id']]);

}

$News->save(['good'=>$_POST['good'],'id'=>$_POST['id']]);
?>