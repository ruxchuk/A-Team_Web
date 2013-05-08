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

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function pNew()
    {
        $post = $this->input->post();
        $message = "";
        if ($post) {
            extract($post);
            $checkAdd = $this->checkAddProduct($serial);
            if (!$checkAdd) {
                $message = "มีรายการเพิ่มเข้ามาแล้ว";
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
                        $message = "add success";
                    }
                } else {
                    $message = "add fail";
                }
            }
        }
        $arrProduct = $this->getProduct();
        $arrProductType = $this->getProductType();
        $data = array(
            'message' => $message,
            "arrProduct" => $arrProduct,
            "arrProductType" => $arrProductType
        );
        $this->load->view('product/new', $data);
    }

    public function pEdit($id)
    {

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
        $sqlAnd = $id == 0 ? "" : "AND `product`.id=$id";
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
            ORDER BY a.`priority`,
              a.`date_create`
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
}