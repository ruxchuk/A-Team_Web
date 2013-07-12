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

    function memberNew($post, $memberType = 2, $permission = "1|2")
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
            'permission_price' => $permission,
            'date_create' => date("Y-m-d H:i:s"),
            'date_update' => "0000-00-00 00:00:00"
        );
        $this->db->insert('member', $data);
        $id = $this->db->insert_id('member');

        //stamp logs
        $detailLogs = "add member;user_id=$id;";
        $this->Logs_model->saveLogs("member", $id, $detailLogs);
        return $id;
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

    /**
     * @param $email
     * @param $id
     * @return null
     */
    function getMember($email, $id = null)
    {
        $arrWhere = empty($id) ?
            array(
                'publish' => 1,
                'email' => trim($email)
            ) : array(
                'publish' => 1,
                'id' => $id
            );
        $query = $this->db->get_where('member', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return null;
        }
    }

    /**
     * @param $id
     * @param $name
     * @param $password
     * @param $email
     * @param $phone
     * @param $address
     * @return mixed
     */
    function editProfile($id, $name, $password, $email, $phone, $address)
    {
        //stamp logs
        $detailLogs = "edit member;user_id=$id;";
        $this->Logs_model->saveLogs("member", $id, $detailLogs);

        $data = array(
            'name' => $name,
            'password' => md5($password),
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'date_update' => date("Y-m-d H:i:s"),
            'token_forget_pass' => md5(date("YmdHis")),
        );
        return $this->db->update('member', $data, array('id' => $id));
    }

    /**
     * @param $id
     * @param $pass
     * @return bool
     */
    function checkPass($id, $pass)
    {
        $arrWhere = array(
            'publish' => 1,
            'password' => md5($pass),
            'id' => $id
        );
        $query = $this->db->get_where('member', $arrWhere);
        if ($query->num_rows()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $token
     * @return null
     */
    function checkTokenResetPass($token)
    {
        $arrWhere = array('publish' => 1, 'token_forget_pass' => $token);
        $query = $this->db->get_where('member', $arrWhere);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return null;
        }
    }

    /**
     * @param $id
     * @param $countForgetPass
     * @param $dateForgetPass
     * @param $token
     * @return bool
     */
    function stampForgetPass($id, $countForgetPass, $dateForgetPass, $token)
    {
        //stamp logs
        $detailLogs = "stamp forget password;user_id=$id;";
        $this->Logs_model->saveLogs("member", $id, $detailLogs);

        $data = array(
            'count_forget_pass' => $countForgetPass,
            'date_forget_pass' => $dateForgetPass,
            'token_forget_pass' => $token,
        );
        return $this->db->update('member', $data, array('id' => $id));
    }

    /**
     * @param $id
     * @param $newPass
     * @return mixed
     */
    function resetPassword($id, $newPass)
    {
        //stamp logs
        $detailLogs = "reset password;user_id=$id;";
        $this->Logs_model->saveLogs("member", $id, $detailLogs);

        $data = array(
            'password' => md5($newPass),
            'token_forget_pass' => md5(date("YmdHis")),
        );
        return $this->db->update('member', $data, array('id' => $id));
    }
}