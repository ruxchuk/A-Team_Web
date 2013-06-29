<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 21/5/2556
 * Time: 11:42 น.
 * To change this template use File | Settings | File Templates.
 */


class Product_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * get product
     * @param int $id
     * @param int $productType
     * @param string $and
     * @param string $order
     * @return object
     */
    function getProduct($id = 0, $productType = 0, $and = "", $order = "")
    {
        $sqlAnd = $id == 0 ? "" : " AND a.id=$id";
        $sqlAnd .= $productType == 0 ? "" : " AND d.id=$productType";
        $sqlAnd .= $and;
        $sqlAnd .= $order == "" ? "
            ORDER BY d.id, a.`priority`,
              a.`date_create` DESC
        " : $order;
        $sql = "
            SELECT
              a.*,
              d.`name` AS product_type_name
            FROM
              `product` a,
              `product_type` d
            WHERE a.`publish` = 1
              AND d.`id` = a.`product_type_id`
              AND d.`publish` = 1
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

    function searchProduct($searchWord)
    {
        $sqlAnd = "
            AND (
            a.`serial` LIKE '%$searchWord%'
            OR a.`name_th` LIKE '%$searchWord%'
            OR a.`name_en` LIKE '%$searchWord%'
            OR a.`brand` LIKE '%$searchWord%'
            OR a.`model` LIKE '%$searchWord%'
            OR a.`value` LIKE '%$searchWord%'
            OR a.`price1` LIKE '%$searchWord%'
            OR a.`price2` LIKE '%$searchWord%'
            OR a.`price3` LIKE '%$searchWord%'
            OR a.`description` LIKE '%$searchWord%'
            )
        ";
        $sql = "
            SELECT
              a.*,
              d.`name` AS product_type_name
            FROM
              `product` a,
              `product_type` d
            WHERE a.`publish` = 1
              AND d.`id` = a.`product_type_id`
              AND d.`publish` = 1
              $sqlAnd
              group by a.id
            ORDER BY a.`priority`,
            a.`date_create` DESC
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

    function getProductTypeFromName($name)
    {
        $query = $this->db->get_where('product_type', array('name' => $name));
        if ($query->num_rows()) {
            $result = $query->result();
            return $result[0]->id;
        } else {
            return -1;
        }
    }
}