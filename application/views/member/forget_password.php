<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 29/5/2556
 * Time: 12:18 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>
<script>
    var url_forget_password = "<?php echo $webUrl; ?>member/forgetPassword";
    function validateForm() {
        $("#submit").attr("disabled", "disabled");
        if ($("#email").val() == "") {
            alert("กรุณากรอก Email");
            $("#email").select();
            $("#submit").attr("disabled", "");
        } else if (!validateEmail($("#email").val())) {
            alert("Email ไม่ถูกต้อง");
            $("#email").select();
            $("#submit").attr("disabled", "");
        } else{
            $.post(url_forget_password, {
                    email: $("#email").val()
                },
                function (result) {
                    if (result == "send success") {
                        //window.location.reload();
                        alert("ระบบได้ทำการส่ง Email ให้ท่านแล้ว ขอบคุณค่ะ");
                        $.fancybox.close();
                    } else {
                        alert(result);
                    }
                    $("#submit").attr("disabled", "");
                }
            );
        }
        return false;
    }

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
</script>
<div class="register">
    <form id="formData" name="formData" action='<?php $_SERVER['PHP_SELF']; ?>'
          method='post' onsubmit="return validateForm();">
        <fieldset>
            <legend class="h-forget"><h3>ขอรหัสผ่านใหม่</h3></legend>
            <!--        <input type='hidden' name='submitted' id='submitted' value='1'/>-->
            <table>
                <tr>
                    <td><label for='email'>Email Address</label><font color="#E72222">*</font>:</td>
                    <td>
                        <input type='text' name='email' id='email' maxlength="50"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div align="right">
                            <button class="button btn btn-primary" id="submit">ส่ง</button>
                        </div>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>