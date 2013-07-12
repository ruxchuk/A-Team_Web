<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 28/5/2556
 * Time: 11:14 น.
 * To change this template use File | Settings | File Templates.
 */

class Auth_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    //-----------------------------Member-----------------------------//
    function memberLogin($username, $passwd)
    {
        $passwd = md5($passwd);
        $sql = "
                SELECT
                  a.*,
                  b.`name` as member_type
                FROM `member` a
                INNER JOIN `member_type` b ON (
                  a.`member_type_id` = b.`id`
                )
                WHERE 1
                AND `user_name` = '$username'
                AND `password` = '$passwd'
                AND publish = 1
            ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            $this->session->set_userdata((array)$result[0]);
            session_start();
            $_SESSION['userdata'] = $this->session->userdata;
            $_SESSION['webUrl'] = $this->Constant_model->webUrl();
            //redirect(base_url() . "web/backend/product.php");
            return true;
        } else {
            //$message = 'login fail';
            return false;
        }
    }

    function memberLogout()
    {
        $this->session->sess_destroy();
        session_start();
        unset($_SESSION["userdata"]);
        $_SESSION['webUrl'] = $this->Constant_model->webUrl();
        return true;
    }
}