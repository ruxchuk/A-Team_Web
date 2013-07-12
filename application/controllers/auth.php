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
            $resultLogin = $this->Auth_model->memberLogin($user_name, $password);
            if ($resultLogin) {
                redirect(base_url() . "web/backend/curtain.php");
            } else {
                $message = 'login fail';
            }
        }
        if (empty($this->session->userdata['user_name'])) {
            $this->load->view('backend/sign-in', array('message' => $message));
        } else {
            redirect(base_url() . "web/backend/curtain.php");
        }
    }

    function signOut()
    {
        $resultLogout = $this->Auth_model->memberLogout();
        if ($resultLogout) {
            redirect($this->Constant_model->webUrl() . 'รายการ');
        }
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