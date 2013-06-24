<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 29/5/2556
 * Time: 10:29 น.
 * To change this template use File | Settings | File Templates.
 */
class Constant_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function webUrl()
    {
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1){
            $webUrl = base_url(). 'index.php/';
        } else {
            $webUrl = base_url();
        }
        return $webUrl;
    }

}