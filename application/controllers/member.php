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
        //$this->load->helper(array('form', 'url'));
//        $this->webUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' :
//            base_url() == "" ? base_url() : "";

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
            //$this->logout();
            $this->load->model('Auth_model');
            $resultLogin = $this->Auth_model->memberLogin($username, $passwd);
            if ($resultLogin) {
                echo 'login success';
            } else {
                echo 'login fail';
            }
        }
        //var_dump($this->session->userdata);
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
            if (trim($user_name) == "admin") {
                echo 'กรุณาตั้งชื่อผู้ใช้อื่น';
            } elseif (trim($user_name) == "") {
                echo 'กรุณากรอกชื่อผู้ใช้';
            } elseif (strlen(trim($user_name)) < 4) {
                echo 'ชื่อผู้ใช้ต้องมีตัวอักษรอย่างน้อย 4 ตัว';
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
                    echo "register success";
                }
            }
            exit();
        }
        $data = array(
            'webUrl' => $this->webUrl,
        );
        $this->load->view("member/register", $data);
    }

}