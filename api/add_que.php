<?php
include('./base.php');
$Que->save(['name'=>$_POST['name'],'sum'=>0,'parent_id'=>0]);

$que_id =  $Que->find(['name'=>$_POST['name']])['id'];

if(isset($_POST['opts'])){

    foreach ($_POST['opts'] as $key => $opt) {
        
        $Que->save(['name'=>$opt,'sum'=>0,'parent_id'=>$que_id]);
        
    }
}

?>