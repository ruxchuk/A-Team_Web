<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 12/7/2556
 * Time: 12:21 น.
 * To change this template use File | Settings | File Templates.
 */
$webUrl = $this->Constant_model->webUrl();
if (!empty($this->session->userdata['user_name'])) :
    redirect($webUrl . "สมาชิก");
endif;

$this->load->view('header');
$this->load->view("sidebar");
$baseUrl = base_url();
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
        <?php if ($error == ""): ?>
            <script>
                var url_reset_password = "<?php echo $webUrl; ?>member/resetPassword";
                function submitResetPass(frm) {
                    if (frm.password.value == "") {
                        alert("กรุณากรอกรหัสผ่าน");
                        frm.password.focus();
                        
                    } else if (frm.re_password.value == "") {
                        alert("กรุณากรอกรหัสผ่าน");
                        frm.re_password.focus();
                        
                    }
                    else if (frm.password.value.length < 6) {
                        alert("รหัสผ่านต้องมีอย่างน้อย 6 ตัว");
                        frm.password.focus();
                        
                    } else if (frm.re_password.value.length < 6) {
                        alert("รหัสผ่านต้องมีอย่างน้อย 6 ตัว");
                        frm.re_password.focus();
                        
                    } else if (frm.password.value != frm.re_password.value) {
                        alert("กรุกรอกรหัสผ่านให้เหมือนกัน");
                        frm.password.focus();
                        
                    } else {
                        $.post(url_reset_password, {
                                password: $("#password").val(),
                                member_id: $("#member_id").val()
                            },
                            function (result) {
                                if (result == "edit success") {
                                    alert("ระบบได้ทำการส่งเปลี่ยนรหัสผ่านใหม่ให้ท่านแล้ว ขอบคุณค่ะ");
                                    window.location.href = "<?php echo $webUrl; ?>สมาชิก";
                                } else {
                                    alert(result);
                                }
                            }
                        );
                    }
                 return false;
                }
            </script>
            <form class="form-horizontal" action='' method="POST" onsubmit="return submitResetPass(this);">
                <input type="hidden" id="member_id" name="member_id" value="<?php echo $memberID; ?>"/>
                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">รหัสผ่านใหม่</label>

                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">

                        <p style="height:10px;margin-top:0px;color: #F07641;font-size: 10px">รหัสผ่านต้องมีอย่างน้อย 6
                            ตัว</p>
                    </div>
                    <label class="control-label" for="re_password">กรอกรหัสผ่านใหม่อีกครั้ง</label>

                    <div class="controls">
                        <input type="password" id="re_password" name="re_password" placeholder="" class="input-xlarge">
                    </div>
                    <button class="button btn btn-primary" id="submit">ตกลง</button>
                </div>
            </form>
        <?php else : ?>
            <div class="control-group">
                <p style="color: #E72222;font-size: 18px;"><?php echo $error; ?></p>
            </div>
        <?php endif; ?>
    </div>
</td>
<?php
$this->load->view('footer');
?>
