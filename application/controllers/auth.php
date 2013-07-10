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
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function signIn()
    {
        $message = "";
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $password = md5($password);
            $sql = "
              SELECT
                  a.*,
                  b.`name` as member_type
                FROM `member` a
                INNER JOIN `member_type` b ON (
                  a.`member_type_id` = b.`id`
                )
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
                $_SESSION['webUrl'] = $this->Constant_model->webUrl();
                redirect(base_url() . "web/backend/curtain.php");
            } else {
                $message = 'login fail';
            }
        }
        if (empty($this->session->userdata['user_name'])) {
            $this->load->view('sign-in', array('message' => $message));
        } else {
            redirect(base_url() . "web/backend/curtain.php");
        }
    }

    function signOut()
    {
        $this->session->sess_destroy();
        session_start();
        unset($_SESSION["userdata"]);
        redirect($this->Constant_model->webUrl() . 'auth/signIn');
    }

    function stampLogs()
    {
        $post = $this->input->post();
        if ($post) {
            extract($post);
            $data = array(
                'table' => $table,
                'table_id' => $id,
                'detail' => $detail,
                'date_stamp' => date("Y-m-d H:i:s"),
            );
            $this->db->insert('logs', $data);
            return $id = $this->db->insert_id('logs');
        }
    }
}