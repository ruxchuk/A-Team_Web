<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 2/5/2556
 * Time: 15:57 น.
 * To change this template use File | Settings | File Templates.
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
    private $webUrl = "";
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->webUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? base_url().  'index.php/' : base_url();
    }

    public function index()
    {
        $this->load->model('Product_model');
        $arrProduct = $this->Product_model->getProduct();
        $data = array(
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => true,
            'webUrl' => $this->webUrl
        );
        $this->load->view('index', $data);
    }

}
