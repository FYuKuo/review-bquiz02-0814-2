<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>

    <table class="ct w-100">
        <tr>
            <th style="width: 6%;">編號</th>
            <th>問卷題目</th>
            <th style="width: 6%;">投票總數</th>
            <th style="width: 6%;">結果</th>
            <th style="width: 6%;">狀態</th>
        </tr>
        <?php
        $ques = $Que->all(['parent_id'=>0]);
        foreach ($ques as $key => $que) {
        ?>
        <tr>
            <td>
                <?=$key+1?>.
            </td>
            <td>
                <?=$que['name']?>
            </td>
            <td>
                <?=$que['sum']?>
            </td>
            <td>
                <a href="?do=res&id=<?=$que['id']?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['user'])){
                ?>
                <a href="?do=vote&id=<?=$que['id']?>">參與投票</a>
                <?php
                }else{
                ?>
                請先登入
                <?php
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>