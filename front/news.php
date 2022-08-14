<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>

    <table class="aut ct w-100">
        <tr>
            <th style="width: 33%;">標題</th>
            <th style="width: 50%;">內容</th>
            <th ></th>
        </tr>
        <?php
            $num = $News->math('COUNT','id',['sh'=>1]);
            $limit = 4;
            $pages = ceil($num/$limit);
            $page = ($_GET['page'])??1;
            if($page <= 0 || $page > $pages){
                $page = 1;
            }
            $start = ($page-1)*$limit;
            $limitSql = " Limit $start,$limit";
            $rows = $News->all(['sh'=>1],$limitSql);
            foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td class="clo myTitle"><?=$row['title']?></td>
                <td>
                    <span><?=mb_substr($row['text'],0,10)?>...</span>
                    <span style="display: none;"><?=$row['text']?></span>
                </td>
                <td>
                    <?php
                    if(isset($_SESSION['user'])){
                        if(empty($Log->find(['news_id'=>$row['id'],'user'=>$_SESSION['user']]))){
                    ?>
                    <span class="likeBtn" onclick="add_good(1,<?=$row['good']+1?>,<?=$row['id']?>)">讚</span>
                    <?php
                        }else{
                    ?>
                    <span class="likeBtn" onclick="add_good(0,<?=$row['good']-1?>,<?=$row['id']?>)">收回讚</span>
                    <?php
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <div class="page">
            <?php
            if($page > 1){
            ?>
            <a href="?do=news&page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?do=news&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }
            if($page < $pages){
            ?>
            <a href="?do=news&page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
    </div>


</fieldset>


<script>

    $(document).ready(function(){
        $('.myTitle').click(function(){
            $(this).next().children().toggle();
        })
    })

    function add_good(type,good,id){

        $.post('./api/add_good.php',{type,good,id},()=>{
            location.reload();
        })
    }
</script>