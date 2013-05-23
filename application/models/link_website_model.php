<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 22/5/2556
 * Time: 17:02 น.
 * To change this template use File | Settings | File Templates.
 */

class Link_website_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * get all link
     *
     * @return object
     */
    function getAllLink()
    {
        $sql = "
            SELECT
              *
            FROM
              `link_website`
            WHERE 1
              AND `publish` = 1
            ORDER BY FIELD(
                `link_group`,
                'ผ้าม่าน',
                'ช่องรายการ',
                'ดาวเทียม',
                'เครื่องปรับอากาศ',
                'กล้องวงจรปิด'
              ),
              `count_click` DESC
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            return $query->result();
        } else {
            return (object)array();
        }
    }

    /**
     * get link
     *
     * @param $id
     * @return string
     */
    function getLinkByID($id)
    {
        $query = $this->db->get_where('link_website', array('id' => $id));
        if ($query->num_rows()) {
            $result =  $query->result();
            return $result[0]->link;
        } else {
            return "";
        }
    }

    /**
     * add count click link
     *
     * @param $id
     * @return bool
     */
    function stampCount($id)
    {
        $query = $this->db->get_where('link_website', array('id' => $id));
        if ($query->num_rows()) {
            $result =  $query->result();
            $count = intval($result[0]->count_click) + 1;
            $this->count_click = $count;
            return $this->db->update('link_website', $this, array('id' => $id));
        } else {
            return false;
        }
    }
}