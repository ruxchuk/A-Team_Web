<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chukkapun
 * Date: 23/4/2556
 * Time: 22:53 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function signIn()
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $password = md5($password);
            $sql = "
                SELECT
                  *
                FROM `member`
                WHERE 1
                AND `user_name` = '$user_name'
                AND `password` = '$password'
                AND publish = 1
            ";
            $query = $this->db->query($sql);
            if ($query->num_rows()) {
                $result = $query->result();
                $this->session->set_userdata((array)$result[0]);
                session_start();
                $_SESSION['userdata'] = $this->session->userdata;
                redirect("web/backend/product.php");
            } else {
                $message = 'login fail';
            }
        }
        if (empty($this->session->userdata['user_name'])){
            $this->load->view('sign-in', array('message' => $message));
        } else {
            redirect("web/backend/product.php");
        }
    }

    public function signOut()
    {
        $this->session->sess_destroy();
        session_start();
        unset($_SESSION["userdata"]);
        redirect(base_url().'auth/signIn');
    }
}