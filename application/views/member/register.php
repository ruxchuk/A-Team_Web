<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 28/5/2556
 * Time: 13:13 น.
 * To change this template use File | Settings | File Templates.
 */

$baseUrl = base_url();
?>
<script>
    var url_register = "<?php echo $webUrl; ?>member/register";
    var url_login = "<?php echo $webUrl; ?>member/login";
    function validateRegister()
    {
        if ($("#name").val() == "") {
            alert('กรุณากรอก ชื่อ-นามสกุล');
            $("#name").select();
            return false;
        } else if ($("#email").val() == "") {
            alert('กรุณากรอก email');
            $("#email").select();
            return false;
        }  else if (!validateEmail($("#email").val())) {
            alert('รูปแบบ email ผิด');
            $("#email").select();
            return false;
        } else if ($("#phone").val() == "") {
            alert('กรุณากรอก เบอร์โทร');
            $("#phone").select();
            return false;
        } else if ($("#address").val() == "") {
            alert('กรุณากรอก ที่อยู่');
            $("#address").select();
            return false;
        } else if ($("#user_name").val() == "") {
            alert('กรุณากรอก ชื่อผู้ใช้');
            $("#user_name").select();
            return false;
        } else if ($("#password").val() == "") {
            alert('กรุณากรอก รหัสผ่าน');
            $("#password").select();
            return false;
        }
        return true;
    }

    $(document).ready(function(){
       $("#submit").click(function(){
           $("#submit").attr("disabled", "disabled");
           if (validateRegister()) {
               $.ajax({
                   type        : "POST",
                   cache       : false,
                   url         : url_register,
                   //data        : $("#register").serializeArray(),
                   data        : {
                       name: $("#name").val(),
                       email: $("#email").val(),
                       phone: $("#phone").val(),
                       address: $("#address").val(),
                       user_name: $("#user_name").val(),
                       password: $("#password").val()
                   },
                   success: function(data) {
                       if (data == "register success") {
                           alert("สวัดดีคุณ " + $("#name").val());
                           window.location.reload();
                           /*$.post(url_login, {
                                   username: $("#user_name").val(),
                                   passwd: $("#passwd").val()
                               },
                               function (result) {
                                   if (result == "login fail") {
                                       alert('เกิดการผิดพลาด\n** กรุณาตรวจสอบ **');
                                   } else {
                                       alert("สวัดดีคุณ " + $("#name").val());
                                       window.location.reload();
                                   }
                               }
                           );*/
                       } else {
                           alert(data)
                           //window.location.reload();
                       }
                       $("#submit").attr("disabled", "");
                   }
               });
           } else {
               $("#submit").attr("disabled", "");
           }
           return false;
       });
    });

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

</script>
<div class="register">
    <form id="register" name="register" action='<?php $_SERVER['PHP_SELF']; ?>'
          method='post' onsubmit="return validateForm(this);">
        <fieldset>
            <legend class="h-register"><h3>สมัครสมาชิก</h3></legend>
            <!--        <input type='hidden' name='submitted' id='submitted' value='1'/>-->
            <table>
                <tr>
                    <td valign="top"><label for='name'>ชื่อ-นามสกุล</label><font color="#E72222">*</font></td>
                    <td>
                        <input type='text' name='name' id='name' maxlength="50" size="20"/></td>
                </tr>
                <tr>
                    <td valign="top"><label for='email'>Email</label><font color="#E72222">*</font></td>
                    <td>
                        <input type='text' name='email' id='email' maxlength="50" size="20"/></td>
                </tr>
                <tr>
                    <td valign="top"><label for='phone'>เบอร์โทร</label><font color="#E72222">*</font></td>
                    <td>
                        <input type='text' name='phone' id='phone' maxlength="20" size="20"/></td>
                </tr>
                <tr>
                    <td valign="top"><label for='address'>ที่อยู่</label><font color="#E72222">*</font></td>
                    <td>
                        <textarea name="address" id="address" style="resize: none; margin: 2px;
                        width: 146px; height: 80px;"></textarea></td>
                </tr>
                <tr>
                    <td valign="top"><label for='user_name'>ชื่อผู้ใช้</label><font color="#E72222">*</font></td>
                    <td><input type='text' name='user_name' id='user_name' maxlength="20" size="20"
                            title="ชื่อผู้ใช้ ใช้ในการ login เข้าสู่ระบบ"/>
                        <p style="height:10px;margin-top:-5px;color: #F07641;font-size: 10px">ชื่อผู้ใช้ต้องมีอย่างน้อย 4 ตัว</p>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for='password'>รหัสผ่าน</label><font color="#E72222">*</font>
                    </td>
                    <td><input type='password' name='password' id='password' maxlength="20" size="20"
                            title="รหัสผ่าน ใช้ในการ login เข้าสู้ระบบ"/>
                        <p style="height:10px;margin-top:-5px;color: #F07641;font-size: 10px">รหัสผ่านต้องมีอย่างน้อย 6 ตัว</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div align="right">
                            <button class="button btn btn-primary" id="submit">ตกลง</button>
                        </div>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>