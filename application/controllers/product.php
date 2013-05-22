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
        redirect($this->webUrl . "auth/signIn");
//        if (empty($this->session->userdata['username'])) {
//            redirect("web/backend/product.php");
//        } else {
//            redirect($this->baseUrl . "auth/signIn");
//        }
    }

    function productType()
    {
        //สินค้า/ผ้าม่าน/3
        $productTypeName = $this->uri->segment(2);
        $productID = $this->uri->segment(3);

        $this->load->model('Product_model');
        $productTypeID = $this->Product_model->getProductTypeFromName($productTypeName);

        $this->view($productID, $productTypeID);
    }

    function productAll()
    {
        //สินค้า/ผ้าม่าน
        $productTypeName = $this->uri->segment(2);

        $this->load->model('Product_model');
        $productTypeID = $this->Product_model->getProductTypeFromName($productTypeName);

        $arrProduct = $this->Product_model->getProduct(0, intval($productTypeID));
        $keyword = "";
        $data = array(
            'error' => '',
            'arrProduct' => $arrProduct,
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => "ตัวแทนจำหน่าย ผ้าม่าน จานดาวเทียม แอร์ กล้องวงจรปิด",
            'keyword' => $keyword
        );
        $this->load->view('index', $data);
    }

    function view($id, $productTypeID)
    {
        $this->load->model('Product_model');
        $arrProduct = $this->Product_model->getProduct(intval($id), intval($productTypeID));
        $title = $arrProduct[0]->name_th;
        $keyword = $arrProduct[0]->keyword != "" ? ", " . $arrProduct[0]->keyword : "";
        $data = array(
            'error' => '',
            'product' => $arrProduct,
            'showSlide' => false,
            'webUrl' => $this->webUrl,
            'siteTitle' => $title,
            'keyword' => $keyword
        );
        $this->load->view("product/view", $data);
    }

    public function pNew()
    {
        var_dump($this->session->userdata['user_name']);
        $post = $this->input->post();
        $message = "";
        if ($post) {
            extract($post);
            $checkAdd = $this->checkAddProduct($serial);
            if (!$checkAdd) {
                $message = "<span style='background-color: greenyellow;'>
                <font color='red'>มีรายการเพิ่มเข้ามาแล้ว</font></span>";
            } else {
                $sql = "
                    INSERT INTO `product` (
                      `product_type_id`,
                      serial,
                      `name_th`,
                      `name_en`,
                      `brand`,
                      `model`,
                      `value`,
                      `priority`,
                      `image_path`,
                      `description`,
                      `keyword`,
                      `date_create`,
                      `date_stamp`
                    )
                    VALUES
                      (
                        '$product_type_id',
                        '$serial',
                        '$name_th',
                        '$name_en',
                        '$brand',
                        '$model',
                        '$value',
                        $priority,
                        '$image_path',
                        '$description',
                        '$keyword',
                         NOW(),
                        '0000-00-00 00:00:00'
                      );
                ";
                $result = $this->db->query($sql);

                if ($result) {
                    $id = $this->db->insert_id();
                    $price1 = empty($price1) ? 0 : $price1;
                    $price2 = empty($price2) ? 0 : $price2;
                    $sql = "
                        INSERT INTO `product_price` (
                            `price`,
                            `price_type`,
                            product_id
                        )
                        VALUES
                        (
                            $price1,
                            'ขายปลีก',
                            $id
                        ) ;
                    ";
                    $this->db->query($sql);
                    $sql = "
                        INSERT INTO `product_price` (
                            `price`,
                            `price_type`,
                            product_id
                        )
                        VALUES
                        (
                            $price2,
                            'ขายส่ง',
                            $id
                        ) ;
                    ";
                    $result = $this->db->query($sql);
                    if ($result) {
                        $message = "<font color='green'>เพิ่มรายการสำเร็จแล้ว</font>";
                        $post = null;
                    }
                } else {
                    $message = "<font color='red'>การเพิ่มรายการผิดพลาด</font>";
                }
            }
        }
        $arrProduct = $this->getProduct();
        $arrProductType = $this->getProductType();
        $data = array(
            'message' => $message,
            "arrProduct" => $arrProduct,
            "arrProductType" => $arrProductType,
            "arrayPost" => $post
        );
        $this->load->view('product/new', $data);
    }

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

    public function dataG()
    {
        $this->load->library('product');
//        $this->load->libraries('product');
    }
}