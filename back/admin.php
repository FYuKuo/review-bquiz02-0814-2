<fieldset class="p-20 aut">
    <legend>帳號管理</legend>

    <table class="w-70 aut ct">
    <tr class="clo">
        <td>帳號</td>
        <td>密碼</td>
        <td>刪除</td>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $key => $row) {
        if($row['acc'] != 'admin'){
    ?>
        <tr>
            <td><input type="text" name="acc[]" value="<?=$row['acc']?>"></td>

            <td><input type="password" name="pw[]" value="<?=$row['pw']?>"></td>

            <td>
                <input type="checkbox" name="del[]" value="<?=$row['id']?>">
            </td>
        </tr>
    <?php
        }
    }
    ?>
    <tr>
        <td colspan="3">
            <input type="button" value="確定刪除" onclick="del()">
            <input type="button" value="清空選取" onclick="resetDel()">
        </td>
    </tr>
    </table>


    <h2>新增會員</h2>

    <table>
        <tr>
            <td colspan="2" style="color: red;">
                *請設定您要註冊的帳號及密碼(最長12個字元)
            </td>
        </tr>
        <tr>
            <td class="clo w-50">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc" style="width: 80%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw" style="width: 80%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step3:再次確認密碼</td>
            <td><input type="password" name="pwch" id="pwch" style="width: 80%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width: 80%;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" value="註冊" onclick="reg()">
                <input type="button" value="清除" onclick="reset()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reset() {
        $('#acc').val("");
        $('#pw').val("");
        $('#pwch').val("");
        $('#email').val("");
    }

    function reg() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pwch = $('#pwch').val();
        let email = $('#email').val();

        if (acc == '' || pw == '' || pwch == '' || email == '') {
            alert('不可為空');
        } else {

            if (pw == pwch) {

                $.post('./api/reg.php', {
                    acc,
                    pw,
                    email
                }, (res) => {

                    if (parseInt(res) == 1) {

                        location.reload();
                    } else {
                        alert('帳號重複');
                    }

                })

            } else {
                alert('密碼錯誤');
            }
        }

    }

    function del(){

        let del = new Array();

        $('input[type=checkbox]:checked').each((key,val)=>{
            del.push($(val).val());
        })

        $.post('./api/del_user.php',{del},()=>{
            location.reload();
        })
    }

    function resetDel(){

        $('input[type=checkbox]:checked').prop('checked',false);
    }
</script>