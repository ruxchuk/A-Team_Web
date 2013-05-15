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

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data = array(
            'error' => '',
            'arrProduct' => $this->getProduct()
        );
        $this->load->view('index', $data);
    }

    /**
     * get product
     * @param int $id
     * @return object
     */
    function getProduct($id = 0)
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
}
