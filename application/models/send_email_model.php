<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 29/5/2556
 * Time: 12:45 น.
 * To change this template use File | Settings | File Templates.
 */

class Send_email_model extends CI_Model
{

    private $emailInfo = "info@latendahouse.com";
    private $webUrl = "";

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $this->webUrl .= base_url() . 'index.php/';
        } else {
            $this->webUrl = base_url();
        }
    }

    function sendRegister($sendTo, $user)
    {
        $data = array(
            'webUrl' => $this->webUrl
        );
        $this->load->library('email');

        //config
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        //$config['charset'] = 'iso-8859-1';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);

        //config
        $this->email->from($this->emailInfo, 'ชื่อผู้ส่ง');
        $this->email->to($sendTo); //ส่งถึงใคร
        //$this->email->cc('another@another-example.com'); //cc ใคร
        //$this->email->bcc('them@their-example.com'); //bcc ใคร
        $this->email->subject("สร้างชื่อผู้ใช้ $user ให้คุณแล้ว"); //หัวข้อของอีเมล
        $this->email->message($this->load->view( 'member/email_register', $data, true )); //เนื้อหาของอีเมล
        $this->email->send();
        return $this->email->print_debugger();
    }

    function sendForgetPassword($sendTo)
    {
        $data = array(
            'webUrl' => $this->webUrl
        );
        $this->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.latendahouse.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@latendahouse.com',
            'smtp_pass' => 'w,j[vd',
            'mailtype'  => 'html',
//            'charset'   => 'iso-8859-1',
            'charset'   => 'utf-8',
            'wordwrap'   => TRUE,
        );
        //$this->load->library('email', $config);

        //config
//        $config['protocol'] = 'sendmail';
//        $config['mailpath'] = '/usr/sbin/sendmail';
        //$config['charset'] = 'iso-8859-1';
        //$config['charset'] = 'utf-8';
        //$config['wordwrap'] = TRUE;
        $this->email->initialize($config);

        //config
        $this->email->from($this->emailInfo, 'ชื่อผู้ส่ง');
        $this->email->to($sendTo); //ส่งถึงใคร
        //$this->email->cc('another@another-example.com'); //cc ใคร
        //$this->email->bcc('them@their-example.com'); //bcc ใคร
        $this->email->subject("สร้างรหัสผ่านใหม่ latendahouse.com"); //หัวข้อของอีเมล
        $this->email->message($this->load->view( 'member/email_forget_password', $data, true )); //เนื้อหาของอีเมล
        $this->email->send();
        return $this->email->print_debugger();
    }
}