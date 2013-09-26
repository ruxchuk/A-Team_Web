<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 7/5/2556
 * Time: 16:15 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Curtain extends CI_Controller
{

    private $webUrl = "";

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = array(
            'selectBar' => 'ผ้าม่าน',
            'error' => '',
            'showSlide' => true,
            'siteTitle' => "ผ้าม่าน",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'curtain'
        );
        $this->load->view('curtain/index', $data);
    }

//-----------------------------------------------Curtain-------------------------------------//

    function curtainView()
    {
        $cate = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        $arrData = $this->Curtain_model->getListCurtain($id, "");
        $arrLink = array(
            'Curtain&Fabric' => "curtain-fabric",
            'WallPaper' => "wall-paper",
            'RollerBlind' => "roller-blind",
            'VenetianBlind' => "venetian-blind",
            'FurnitureBuiltIn' => "furniture-built-in",
        );
        $data = array(
            'selectBar' => 'ผ้าม่าน',
            'error' => '',
            'showSlide' => true,
            'siteTitle' => $arrData[0]->name_th,
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => $arrLink[$cate],
            'arrData' => $arrData[0]
        );
        $this->load->view('curtain/view', $data);
    }

    function curtain()
    {
    }

    function curtainFabric()
    {
        $data = array(
            'selectBar' => 'ผ้าม่าน',
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
            'selectBar' => 'ผ้าม่าน',
            'error' => '',
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "Wall Paper",
            'keyword' => "",
            'searchWord' => "",
            "setImageHeader" => 'wall-paper'
        );
        $this->load->view('curtain/wall-paper', $data);
    }

    function rollerBlind()
    {
        $data = array(
            'selectBar' => 'ผ้าม่าน',
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
            'selectBar' => 'ผ้าม่าน',
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
            'selectBar' => 'ผ้าม่าน',
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
}