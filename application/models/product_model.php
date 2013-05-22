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
     * @return object
     */
    function getProduct($id = 0, $productType = 0)
    {
        $sqlAnd = $id == 0 ? "" : " AND a.id=$id";
        $sqlAnd .= $productType == 0 ? "" : " AND d.id=$productType";
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

    function getProductTypeFromName($name)
    {
        $query = $this->db->get_where('product_type', array('name' => $name));
        if ($query->num_rows()) {
            $result = $query->result();
            return $result[0]->id;
        } else {
            return 0;
        }
    }
}