<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 7/5/2556
 * Time: 16:15 น.
 * To change this template use File | Settings | File Templates.
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{

    private $webUrl = "";

    function __construct()
    {
        parent::__construct();
        //$this->load->helper(array('form', 'url'));
//        $this->webUrl .= strstr($_SERVER['HTTP_HOST'], 'localhost') > -1 ? 'index.php/' :
//            base_url() == "" ? base_url() : "";

        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $this->webUrl .= base_url() . 'index.php/';
        } else {
            $this->webUrl = base_url();
        }
    }

    function index()
    {
        $this->load->model('Product_model');
        $arrProduct = $this->Product_model->getProduct();

//        $this->load->model('Link_website_model');
        $strSelectBar = "สินค้า";
        $keyword = "";
        $data = array(
            'selectBar' => $strSelectBar,
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => true,
            'webUrl' => $this->webUrl,
            'siteTitle' => "จานดาวเทียม เครื่องปรับอากาศ กล้องวงจรปิด",
            'keyword' => $keyword,
            "setImageHeader" => 'sat',
        );
        $this->load->view('product/index', $data);
    }

    function productType()
    {
        $productTypeName = $this->uri->segment(2);
        $productID = $this->uri->segment(3);

        if (empty($productID)) {//Ex. สินค้า/จานดาวเทียม
            $productTypeID = $this->Product_model->getProductTypeFromName($productTypeName);
            $arrProduct = $this->Product_model->getProduct(0, intval($productTypeID));
            $data = array(
                'error' => '',
                'arrProduct' => $arrProduct,
                'selectBar' => 'สินค้า',
                'setImageHeader' => 'sat',
                'showSlide' => false,
                'webUrl' => $this->webUrl,
                'siteTitle' => $productTypeName,
                'keyword' => ''
            );
            $this->load->view("product/list-content", $data);
        } else {//Ex. สินค้า/จานดาวเทียม/3
            $this->load->model('Product_model');
            $productTypeID = $this->Product_model->getProductTypeFromName($productTypeName);
            $this->view($productID, $productTypeID);
        }
    }

    function view($id, $productTypeID)
    {
        $productTypeName = $this->uri->segment(1);
        $this->load->model('Product_model');
        $arrProduct = $this->Product_model->getProduct(intval($id), intval($productTypeID));
        $title = $arrProduct[0]->name_th;

        $this->load->model('Link_website_model');

        $keyword = $arrProduct[0]->keyword != "" ? ", " . $arrProduct[0]->keyword : "";
        $data = array(
            'error' => '',
            'product' => $arrProduct,
            'selectBar' => $productTypeName,
            'setImageHeader' => 'sat',
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => $title,
            'keyword' => $keyword
        );
        $this->load->view("product/view", $data);
    }

    function productAll()
    {
        //ผ้าม่าน
        $productTypeName = $this->uri->segment(1);

        $this->load->model('Product_model');
        $productTypeID = $this->Product_model->getProductTypeFromName($productTypeName);

        $arrProduct = $this->Product_model->getProduct(0, intval($productTypeID));

        $this->load->model('Link_website_model');

        $keyword = "";
        $data = array(
            'selectBar' => $productTypeName,
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
            'keyword' => $keyword
        );
        $this->load->view('index', $data);
    }

    /*
        public function pEdit($id)
        {
            $message = "";
            $post = $this->input->post();
            if ($post) {
                extract($post);
                $sql = "
                    UPDATE
                      `product`
                    SET
                      `product_type_id` = '$product_type_id',
                      `name_th` = '$name_th',
                      `name_en` = '$name_en',
                      `brand` = '$brand',
                      `model` = '$model',
                      `value` = '$value',
                      `description` = '$description',
                      `keyword` = '$keyword',
                      `priority` = '$priority',
                      `image_path` = '$image_path',
                      `date_stamp` = NOW()
                    WHERE `id` = '$id' ;
                ";
                $result = $this->db->query($sql);

                if ($result) {
                    $price1 = empty($price1) ? 0 : $price1;
                    $price2 = empty($price2) ? 0 : $price2;
                    $sql = "
                            UPDATE
                              `product_price`
                            SET
                              `price` = $price1
                            WHERE `product_id` = $id
                              AND `price_type` = 'ขายปลีก';
                        ";
                    $this->db->query($sql);
                    $sql = "
                            UPDATE
                              `product_price`
                            SET
                              `price` = $price2
                            WHERE `product_id` = $id
                            AND `price_type` = 'ขายส่ง';
                        ";
                    $result = $this->db->query($sql);
                    if ($result) {
                        $message = "<font color='green'>แก้ไขสำเร็จแล้ว</font>";
                    }
                } else {
                    $message = "<font color='red'>การแก้ไขผิดพลาด</font>";
                }
            }
            $arrProduct = $this->getProduct($id);
            $arrProductType = $this->getProductType();
            $data = array(
                'message' => $message,
                "arrProduct" => $arrProduct[0],
                "arrProductType" => $arrProductType
            );
            $this->load->view('product/edit', $data);
        }
    */

    /**
     * check add product
     *
     * @param $serial
     * @return bool
     */
    public function checkAddProduct($serial)
    {
        $sql = "
            SELECT
                *
            FROM
              `product`
            WHERE `product`.`publish` = 1
            AND `product`.`serial` = '$serial'
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * get product
     * @param int $id
     * @return object
     */
    public function getProduct($id = 0)
    {
        $sqlAnd = $id == 0 ? "" : "AND a.id=$id";
        $sql = "
            SELECT
              a.*,
              d.`name` AS product_type_name,
              (SELECT
                b.`price`
              FROM
                `product_price` b
              WHERE b.`product_id` = a.id
                AND b.`price_type` = 'ขายปลีก'
                AND b.`publish` = 1) AS price1,
              (SELECT
                c.`price`
              FROM
                `product_price` c
              WHERE c.`product_id` = a.id
                AND c.`price_type` = 'ขายส่ง'
                AND c.`publish` = 1) AS price2
            FROM
              `product` a,
              `product_type` d
            WHERE a.`publish` = 1
              AND d.`id` = a.`product_type_id`
              AND d.`publish` = 1
              $sqlAnd
            ORDER BY a.`priority`,
              a.`date_create`
        ";
        $query = $this->db->query($sql);
        $result = array();
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)$result;
        }
    }

    /**
     * get รายการประเภทสินค้า
     *
     * @param int $id
     * @return object
     */
    public function getProductType($id = 0)
    {
        $sqlAnd = $id == 0 ? "" : "AND `product_type`.id=$id";
        $sql = "
            SELECT
              `id`,
              `name`,
              `publish`
            FROM `product_type`
            WHERE `product_type`.`publish` = 1
            $sqlAnd
        ";
        $query = $this->db->query($sql);
        $result = array();
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)$result;
        }
    }

    function showProduct($id)
    {
        $arrProduct = array();
        $keyword = "";
        switch ($id) {
            case"1":
                $arrProduct = $this->Product_model->getProduct(0, 0, " AND a.new = 1");
                break;
            case"2":
                $arrProduct = $this->Product_model->getProduct(0, 0, " AND a.sellers = 1");
                break;
            case"3":
                $arrProduct = $this->Product_model->getProduct(0, 0, " AND a.recommend = 1");
                break;
            case"4":
                $arrProduct = $this->Product_model->getProduct(0, 0, " AND a.promotion = 1");
                break;
        }
        $data = array(
            'selectBar' => "index",
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
            'keyword' => $keyword
        );
        $this->load->view('index', $data);
    }

    function viewProductCart()
    {
        $this->load->helper('cookie');
        $strCart = $this->input->cookie('product_cart', false);
        $arrProduct = array();
        $arrValue = array();
        if ($strCart != "") {
            $exStr = explode('|', $strCart);
            $arrID = array();
            foreach ($exStr as $key => $value) {
                if ($value != "") {
                    $exVal = explode('&', $value);
                    $arrID[] = $exVal[0];
                    $arrValue[] = $exVal[1];
                }
            }
            $strID = implode(', ', $arrID);
            $arrProduct = $this->Product_model->getProduct(
                0,
                0,
                " AND a.id IN ($strID)",
                " ORDER BY FIELD (a.id, $strID)"
            );
        }
        $title = "ตะกล้าสินค้า";
        $data = array(
            "arrData" => $arrProduct,
            "arrValue" => $arrValue,
            'selectBar' => 'index',
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => $title,
            'keyword' => ""
        );
        $this->load->view('product/view_cart', $data);
    }

    function viewForAddToCart($id)
    {
        $arrProduct = $this->Product_model->getProduct(intval($id), 0);
        $data = array(
            "arrData" => $arrProduct[0]
        );
        $this->load->view('product/add_cart', $data);
    }

    function buyProductView()
    {
        $data = array(
            'selectBar' => '',
            'error' => '',
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตะกร้าสินค้า",
            'keyword' => 'ตะกร้าสินค้า'
        );
        $this->load->view('product/view_cal_price', $data);
    }

//-----------------------------------------------Curtain-------------------------------------//

    function curtainView()
    {
        $cate = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        $arrData = $this->Product_model->getListCurtain($id, "");
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