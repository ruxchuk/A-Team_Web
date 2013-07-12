<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 28/5/2556
 * Time: 11:14 น.
 * To change this template use File | Settings | File Templates.
 */

class Logs_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * @param $table
     * @param $id
     * @param $detail
     * @return mixed
     */
    function saveLogs($table, $id, $detail)
    {
        $data = array(
            'table' => $table,
            'table_id' => $id,
            'detail' => $detail,
            'date_stamp' => date("Y-m-d H:i:s"),
        );
        $this->db->insert('logs', $data);
        return $id = $this->db->insert_id('logs');
    }
}