<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 21/5/2556
 * Time: 11:42 น.
 * To change this template use File | Settings | File Templates.
 */


class Curtain_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

//-----------------------------------------------Curtain-------------------------------------//

    /**
     * list slide ผ้าม่าน
     *
     * @return object
     */
    function getListSlideCurtain()
    {
        $query = $this->db->get_where('curtain', array('deleted' => 1, 'slide_main' => 1));
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }

    function getListCurtain($id = 0, $type = "")
    {
        $strAnd = $id != 0 ? " AND id=$id" : "";
        $strAnd .= $type != '' ? " AND curtain_type='$type'" : "";
        $sql = "
            SELECT
              *
            FROM
              `curtain`
            WHERE 1
              AND `deleted` = 1
              $strAnd
            ORDER BY `priority`,
              `date_create`,
              date_stamp DESC
        ";
        $query = $this->db->query($sql);
        if ($query->num_rows()) {
            $result = $query->result();
            return $result;
        } else {
            return (object)array();
        }
    }
}