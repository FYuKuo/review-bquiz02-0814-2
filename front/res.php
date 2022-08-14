<?php
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['name']?></legend>

    <h4><?=$que['name']?></h4>

        <?php
        $opts = $Que->all(['parent_id'=>$_GET['id']]);
        foreach ($opts as $key => $opt) {
            $num = round(($opt['sum']/$que['sum'])*100,0);
        ?>
        <div style="margin: 20px 0;" class="d-flex a-c w-100">
            <div class="w-30 ">
                <?=$key+1?>
                .
                <?=$opt['name']?>
            </div>
            &nbsp;


            <div class="w-60 d-flex a-c">
                <div style="background-color: #ccc;height: 25px;width:<?=$num?>%"></div>
        &nbsp;

                <div>
                <?=$opt['sum']?>票(<?=$num?>%)
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="ct">
            <input type="button" value="返回" onclick="location.href='./index.php?do=que'">
        </div>

</fieldset>