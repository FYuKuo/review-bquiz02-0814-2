<div>目前位置：首頁 > 分類網誌 > <span class="changeTitle">健康新知</span></div>

<div class="d-flex j-c">
    <fieldset class="w-20">
        <legend>分類網誌</legend>

        <div class="list_item" onclick="get_list('健康新知',1)">健康新知</div>
        <div class="list_item" onclick="get_list('菸害防治',2)">菸害防治</div>
        <div class="list_item" onclick="get_list('癌症防治',3)">癌症防治</div>
        <div class="list_item" onclick="get_list('慢性病防治',4)">慢性病防治</div>
    </fieldset>

    <fieldset class="w-60">
        <legend class="changeTitle2">文章列表</legend>

        <div class="showDiv">
            
        </div>

        
    </fieldset>
</div>

<script>
    get_list('健康新知',1);

    function get_list(text,type){

        $('.showDiv').children().remove();

        $('.changeTitle').text(text);
        $('.changeTitle2').text('文章管理');

        $.get('./api/get_list.php',{type},(res)=>{

            res = JSON.parse(res);

            let addText = '';

            res.forEach(element => {
                addText = addText + `<div class="new_item" onclick="show_list(${element.id})">${element.title}</div>`
            });
            // console.log(res);
            
            $('.showDiv').append(addText);
        })
    }

    function show_list(id){

        $('.showDiv').children().remove();

        
        $.get('./api/show_list.php',{id},(res)=>{

            res = JSON.parse(res);

            
            $('.showDiv').append(`<div>${res.text}</div>`);
            
            $('.changeTitle2').text(res.title);
        })
    }


</script>