<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 28/5/2556
 * Time: 17:25 น.
 * To change this template use File | Settings | File Templates.
 */

class Member_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function memberNew($post, $memberType = 2)
    {
        extract($post);
        $data = array(
            'name' => trim($name),
            'user_name' => trim($user_name),
            'password' => md5($password),
            'email' => $email,
            'phone' => trim($phone),
            'address' => trim($address),
            'member_type_id' => $memberType,
            'date_create' => date("Y-m-d H:i:s"),
            'date_update' => "0000-00-00 00:00:00"
        );
        $this->db->insert('member', $data);
        return $id = $this->db->insert_id('member');

    }

    /**
     * check email ซ้ำ
     *
     * @param $email
     * @return bool
     */
    function checkEmailRegister($email)
    {
        $arrWhere = array('publish' => 1, 'email' => trim($email));
        $query = $this->db->get_where('member', $arrWhere);
        if ($query->num_rows()) {
            //$result = $query->result();
            return false;
        } else {
            return true;
        }
    }

    /**
     * check username ซ้ำ
     *
     * @param $user_name
     * @return bool
     */
    function checkUsernameRegister($user_name)
    {
        $arrWhere = array('publish' => 1, 'user_name' => trim($user_name));
        $query = $this->db->get_where('member', $arrWhere);
        if ($query->num_rows()) {
            //$result = $query->result();
            return false;
        } else {
            return true;
        }
    }
}