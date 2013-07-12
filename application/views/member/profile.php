<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 10/7/2556
 * Time: 14:27 น.
 * To change this template use File | Settings | File Templates.
 */

$this->load->view('header');
$this->load->view("sidebar");
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
?>
    <td class="maincol">
        <?php
        $getMenu1 = $this->uri->segment(1);
        //$getMenu2 = $this->uri->segment(2);
        ?>
        <div>
            <p>
                &nbsp;&nbsp;&nbsp;
                <a class="link-page" href="<?php echo $webUrl; ?>">หน้าแรก</a> /
                <!--            <a class="link-page" href="--><?php //echo $webUrl . $getMenu1; ?><!--">-->
                <?php //echo $getMenu1; ?><!--</a> /-->
                <span class="active-page"><?php echo $getMenu1; ?></span>
            </p>
        </div>
        <div style="margin-left: 45px;">
            <?php if (!empty($this->session->userdata['user_name'])) : ?>

                <script>
                    var url_edit_profile = "<?php echo $webUrl; ?>สมาชิก";
                    function validateEditProfile()
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
                        } else if ($("#old_password").val() == "") {
                            alert('กรุณากรอก รหัสผ่าน');
                            $("#old_password").select();
                            return false;
                        } else if ($("#new_password").val() != "" && $("#new_password").val().length < 6) {
                            alert('รหัสผ่านต้องมีอย่างน้อย 6 ตัว');
                            $("#new_password").select();
                            return false;
                        }
                        return true;
                    }

                    $(document).ready(function(){
                        $("#submit").click(function(){
                            $("#submit").attr("disabled", "disabled");
                            if (validateEditProfile()) {
                                $.ajax({
                                    type        : "POST",
                                    cache       : false,
                                    url         : url_edit_profile,
                                    data        : {
                                        name: $("#name").val(),
                                        email: $("#email").val(),
                                        phone: $("#phone").val(),
                                        address: $("#address").val(),
                                        old_password: $("#old_password").val(),
                                        new_password: $("#new_password").val()
                                    },
                                    success: function(data) {
                                        if (data == "edit success") {
                                            alert("บันทึกข้อมูลของท่าน เรียบร้อยแล้ว");
                                            window.location.reload();
                                        }else if (data == "error pass") {
                                            alert("รหัสผ่านผิด กรุณากรอกรหัสผ่านใหม่");
                                            $("#old_password").select();
                                        } else {
                                            alert(data)
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
                <form class="form-horizontal" action='' method="POST" onsubmit="return validateEditProfile();">
                    <table style="font-size: 16px;">
                        <tr>
                            <td valign="top"><label for='name'>ชื่อ-นามสกุล</label><font color="#E72222">*</font></td>
                            <td>
                                <input type='text' name='name' id='name' maxlength="50" size="20"
                                    value="<?php echo $data->name; ?>"/></td>
                        </tr>
                        <tr>
                            <td valign="top"><label for='email'>Email</label><font color="#E72222">*</font></td>
                            <td>
                                <input type='text' name='email' id='email' maxlength="50" size="20"
                                       value="<?php echo $data->email; ?>"/></td>
                        </tr>
                        <tr>
                            <td valign="top"><label for='phone'>เบอร์โทร</label><font color="#E72222">*</font></td>
                            <td>
                                <input type='text' name='phone' id='phone' maxlength="20" size="20"
                                       value="<?php echo $data->phone; ?>"/></td>
                        </tr>
                        <tr>
                            <td valign="top"><label for='address'>ที่อยู่</label><font color="#E72222">*</font></td>
                            <td>
                                <textarea name="address" id="address" style="resize: none; margin: 2px;
                        width: 146px; height: 80px;"><?php echo $data->address; ?></textarea></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <label for='old_password'>รหัสผ่านเดิม</label><font color="#E72222">*</font>
                            </td>
                            <td><input type='password' name='old_password' id='old_password' maxlength="20" size="20"
                                       title="รหัสผ่านเดิม"/>
                                <p style="height:10px;margin-top:-5px;color: #F07641;font-size: 10px">รหัสผ่านต้องมีอย่างน้อย 6 ตัว</p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <label for='new_password'>รหัสผ่านใหม่</label>
                            </td>
                            <td><input type='password' name='new_password' id='new_password' maxlength="20" size="20"
                                       title="รหัสผ่านใหม่ใช้ในการ login เข้าสู้ระบบ"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div align="right">
                                    <button class="button btn btn-primary" id="submit">บันทึก</button>
                                </div>
                            </td>
                        </tr>
                    </table>

                </form>
            <?php else: ?>
                <div>
                    <script>
                        function submitLogin2(frm)
                        {
                            if (validateLogin(frm)) {
                                $.post(url_login, $("#form-login2").serialize(),
                                    function (result) {
                                        if (result == "login fail") {
                                            alert('ชื่อผู้ใช้ หรือรหัสผ่านผิด\n** กรุณาตรวจสอบ **');
                                            frm.username.select();
                                        } else {
                                            window.location.reload();
                                        }
                                    }
                                );
                            }
                            return false;
                        }
                    </script>
                    <h3>เข้าสู่ระบบ</h3>

                    <form action="" method="post" name="login" id="form-login2"
                          onsubmit="return submitLogin2(this);">
                        <fieldset class="input">
                            <p id="form-login-username">
                                <label for="username">ชื่อผู้ใช้</label><br/>
                                <input id="username" type="text" name="username" class="inputbox" alt="username"
                                       size="18"/>
                            </p>

                            <p id="form-login-password">
                                <label for="passwd">รหัสผ่าน</label><br/>
                                <input id="passwd" type="password" name="passwd" class="inputbox" size="18"
                                       alt="password"/>
                            </p>
                            <!--                        <input type="submit" name="Submit" class="button" value="เข้าสู่ระบบ"/>-->
                            <button class="button btn btn-danger">เข้าสู่ระบบ</button>

                        </fieldset>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </td>
<?php
$this->load->view('footer');
?>