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
//        $this->webUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' :
//            base_url() == "" ? base_url() : "";
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1){
            $this->webUrl .= base_url(). 'index.php/';
        } else {
            $this->webUrl = base_url();
        }
    }

    public function index()
    {
        $this->load->model('Product_model');
        $arrProduct = $this->Product_model->getProduct();

        $this->load->model('Link_website_model');
        $strSelectBar = "index";
        $keyword = "";
        $data = array(
            'selectBar' => $strSelectBar,
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
            'keyword' => $keyword,
            "setImageHeader" => 1
        );
        $this->load->view('index', $data);
    }

    function openWeb($id)
    {
        $this->load->model('Link_website_model');
        $strLink = $this->Link_website_model->getLinkByID($id);//get link

        $result = $this->Link_website_model->stampCount($id);//stamp count click
        if (!$result) {
            echo "ไม่พบ link";
        } else {
            redirect($strLink);
        }

    }

    function contactus()
    {
        $strSelectBar = 'contactus';
        $message = "";
        $data = array(
            'webUrl' => $this->webUrl,
            'message' => $message,
            'selectBar' => $strSelectBar,
            'showSlide' => false,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
        );
        $this->load->view('contactus', $data);
    }

    function search()
    {
//        $searchWord = $this->uri->segment(2);
        $searchWord = @$_GET['คำค้นหา'];
        $arrProduct = $this->Product_model->searchProduct($searchWord);

        $this->load->model('Link_website_model');
        $strSelectBar = "index";
        $keyword = "";
        $data = array(
            'selectBar' => $strSelectBar,
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
            'keyword' => $keyword,
            'searchWord' => $searchWord
        );
        $this->load->view('index', $data);
    }

//-----------------------------------------------Curtain-------------------------------------//
    function curtain()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ผ้าม่าน",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'curtain'
        );
        $this->load->view('curtain/index', $data);
    }

    function curtainFabric()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Curtain Fabric",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'curtain-fabric'
        );
        $this->load->view('curtain/curtain-fabric', $data);
    }

    function wallPaper()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Wall Paper",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'wall-paper'
        );
        $this->load->view('curtain/curtain-fabric', $data);
    }

    function rollerBlind()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Roller Blind",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'roller-blind'
        );
        $this->load->view('curtain/roller-blind', $data);
    }

    function venetianBlind()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Venetian Blind",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'venetian-blind'
        );
        $this->load->view('curtain/venetian-blind', $data);
    }

    function furnitureBuiltIn()
    {
        $data = array(
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Furniture Built In",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'furniture-built-in'
        );
        $this->load->view('curtain/furniture-built-in', $data);
    }

//-----------------------------------------------Sat-------------------------------------//
}
