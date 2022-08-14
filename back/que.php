<fieldset>
    <legend>新增問卷</legend>

    <div class="d-flex">
        <div class="w-30 clo">
            問卷名稱
        </div>
        <input type="text" name="name" id="name">
    </div>
    <br>
    <div class="clo more">
        <div>
            選項<input type="text" name="opts[]" class="opts">
            <input type="button" value="更多" onclick="more()">
        </div>
    </div>
    <div>
        <input type="button" value="新增" onclick="add()">
        <input type="button" value="清空" onclick="reset()">
    </div>
</fieldset>

<script>
    function more(){
        $('.more').prepend(`<div>選項<input type="text" name="opts[]" class="opts"></div>`)
    }

    function add(){
        let name = $('#name').val();

        let opts = new Array();

        $('.opts').each((key,val)=>{
            if($(val).val() != ''){
                opts.push($(val).val());
            }
        })

        if(name != '' && opts.length >0){
            $.post('./api/add_que.php',{opts,name},()=>{
                location.reload();
            })
        }
    }

    function reset(){
        $('input[type=text]').val('');
    }   

</script>