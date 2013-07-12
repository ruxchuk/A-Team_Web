<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 28/5/2556
 * Time: 11:15 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller
{

    private $webUrl = "";

    function __construct()
    {
        parent::__construct();
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $this->webUrl .= base_url() . 'index.php/';
        } else {
            $this->webUrl = base_url();
        }
    }

    function login()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $resultLogin = $this->Auth_model->memberLogin($username, $passwd);
            if ($resultLogin) {
                echo 'login success';
            } else {
                echo 'login fail';
            }
        }
    }

    function logout()
    {
        $this->load->model('Auth_model');
        $resultLogout = $this->Auth_model->memberLogout();
        if ($resultLogout) {
            echo 'logout success';
        } else {
            echo 'logout fail';
        }
    }

    function register()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            if (trim($user_name) == "admin" || strstr($user_name, 'admin')) {
                echo 'กรุณาตั้งชื่อผู้ใช้อื่น ที่ไม่มีคำว่า "admin"';
            } elseif (trim($user_name) == "") {
                echo 'กรุณากรอกชื่อผู้ใช้';
            } elseif (strlen(trim($user_name)) < 4) {
                echo 'ชื่อผู้ใช้ต้องมีอย่างน้อย 4 ตัว';
            } elseif (trim($password) == "") {
                echo 'กรุณากรอกรหัสผ่าน';
            } elseif (strlen($password) < 4) {
                echo 'รหัสผ่านต้องมี 4 ตัวขึ้นไป';
            } elseif (!$this->Member_model->checkEmailRegister($email)) {
                echo "Email: \"$email\" มีผู้ใช้งานสมัครเข้ามาแล้ว";
            } elseif (!$this->Member_model->checkUsernameRegister($user_name)) {
                echo "ชื่อผู้ใช้ \"$user_name\" มีผู้ใช้งานสมัครเข้ามาแล้ว";
            } else {
                $result = $this->Member_model->memberNew($post, 2);
                if ($result) {
                    $data = array(
                        'email' => $email
                    );
                    $message = $this->load->view('member/email_register', $data, true);
                    $subject = "สมัคสมาชิก www.latendahouse.com";
                    $name = "www.latendahouse.com";
                    $from = "mailing@latendahouse.com";
                    //send email
                    $result = $this->Send_email_model->sendEmail($email, $subject, $message, $name, $from);
                    //login
                    $resultLogin = $this->Auth_model->memberLogin($user_name, $password);
                    if ($resultLogin) {
                        echo "register success";
                        //echo 'login success';
                    } else {
                        echo 'login fail';
                    }
                    /*if ($result) {
                    } else {
                        echo 'send email error';
                    }*/
                }
            }
            exit();
        }
        $data = array(
            'webUrl' => $this->webUrl,
        );
        $this->load->view("member/register", $data);
    }

    function forgetPassword()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $result = $this->Member_model->checkEmailRegister($email);
            if (!$result) {
                //stamp forget pass
                $objMember = $this->Member_model->getMember($email);
                $memberID = $objMember[0]->id;
                $countForgetPass = $objMember[0]->count_forget_pass;
                $dateForgetPass = $objMember[0]->date_forget_pass;
                if ($dateForgetPass == date('Y-m-d')) {
                    if ($countForgetPass >= 5) {
                        echo "คุณได้ทำการขอรหัสผ่านใหม่เกิน 5 ครั้งต่อวันแล้ว\nกรุณาทำรายการใหม่ในวันถ้ดไป ของคุณค่ะ";
                        exit();
                    } else {
                        $countForgetPass++;
                    }
                } else {
                    $countForgetPass = 1;
                }
                $dateForgetPass = date('Y-m-d');
                $token = md5(strtotime(date('YmdHis')) . "$memberID");
                $this->Member_model->stampForgetPass($memberID, $countForgetPass, $dateForgetPass, $token);

                //send email
                $data = array(
                    'email' => $email,
                    'token' => $token,
                );
                $message = $this->load->view('member/email_forget_password', $data, true);
                $subject = "เปลี่ยนรหัสผ่าน www.latendahouse.com";
                $name = "www.latendahouse.com";
                $from = "mailing@latendahouse.com";
                $result = $this->Send_email_model->sendEmail($email, $subject, $message, $name, $from);
                if ($result)
                    echo "send success";
                else {
                    echo 'การส่ง Email ผิดพลาด ขออภัยค่ะ';
                }
            } else {
                echo "ไม่พบ Email: $email ในระบบค่ะ";
            }
            exit();
        }

        $data = array(
            'webUrl' => $this->webUrl,
        );
        $this->load->view("member/forget_password", $data);
    }

    function profile()
    {
        $memberData = array();
        if (!empty($this->session->userdata['id'])) {
            $memberID = $this->session->userdata['id'];
            $memberData = $this->Member_model->getMember('', $memberID);
            $memberData = $memberData[0];
        }

        $post = $this->input->post();
        if ($post) {
            extract($post);
            $new_password = trim($new_password);
            $name = trim($name);
            $old_password = trim($old_password);
            $email = trinm($email);
            $phone = trim($phone);
            $address = trim($address);
            $checkOldPass = $this->Member_model->checkPass($memberID, $old_password);
            if ($checkOldPass) {
                if ($new_password != "") {
                    $password = $new_password;
                } else {
                    $password = $old_password;
                }

                $result = $this->Member_model->editProfile($memberID, $name, $password, $email, $phone, $address);
                if ($result) {
                    echo "edit success";
                } else {
                    echo "การแก้ไข Profile ผิดพลาด";
                }
            } else {
                echo "error pass";
            }
            exit();
        }
        $data = array(
            'siteTitle' => 'สมาชิก',
            'selectBar' => 'สมาชิก',
            'data' => $memberData,
        );
        $this->load->view("member/profile", $data);
    }

    function resetPassword()
    {
        $error = "";
        $memberID = 0;
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $result = $this->Member_model->resetPassword($member_id, $password);
            if ($result) {
                echo "edit success";
            } else {
                echo "การเปลี่ยนรหัสผ่าน ผิดพลาด";
            }
            exit();
        }
        if (empty($_GET['token'])) {
            $error = "กรุณาตรวจสอบ Link ของท่าน";
        } else {
            $checkToken = $this->Member_model->checkTokenResetPass($_GET['token']);
            if ($checkToken == null) {
                $error = "Link ของท่านผิดพลาด หรือถูกใช้ไปแล้ว กรุณาขอรหัสผ่านใหม่อีกครั้ง";
            } else {
                $memberID = $checkToken[0]->id;
            }
        }
        $data = array(
            'siteTitle' => 'เปลี่ยนรหัสผ่าน',
            'selectBar' => 'สมาชิก',
            'error' => $error,
            'memberID' => $memberID
        );
        $this->load->view("member/reset_password", $data);

    }
}