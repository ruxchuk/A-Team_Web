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
        if (strstr($_SERVER['HTTP_HOST'], 'localhost') > -1) {
            $webUrl = base_url() . 'index.php/';
        } else {
            $webUrl = base_url();
        }
        return $webUrl;
    }

    function loadSlideBar($value)
    {
        $arrSet = array();
        switch ($value) {
            case "product" :
                $arrSet = array(
                    1, 1, 0, 1, 1, 1, 1 // member, menu, curtain, sat, facebook, puenchang, link_web
                );
                break;
            case "product-content" :
                $arrSet = array(
                    1, 0, 0, 1, 1, 1, 1 // member, menu, curtain, sat, facebook, puenchang, link_web
                );
                break;
            case "curtain" :
                $arrSet = array(
                    1, 1, 1, 0, 1, 1, 1 // member, menu, curtain, sat, facebook, puenchang, link_web
                );
                break;
            case "curtain-content" :
                $arrSet = array(
                    1, 0, 1, 0, 1, 1, 1 // member, menu, curtain, sat, facebook, puenchang, link_web
                );
                break;
            default:
                $arrSet = array(
                    1, 0, 0, 0, 0, 0, 0 // member, menu, curtain, sat, facebook, puenchang, link_web
                );
                break;
        }
        return $arrSet;
    }

}