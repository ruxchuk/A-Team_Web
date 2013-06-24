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
            $result = $query->result();
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
            $result = $query->result();
            $count = intval($result[0]->count_click) + 1;
            $this->count_click = $count;
            return $this->db->update('link_website', $this, array('id' => $id));
        } else {
            return false;
        }
    }

    /**
     * get detail click
     *
     * @return string
     */
    function getDetailClick()
    {
        $this->agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
        $this->getBrowser();
        $this->getOS();
        // if you want to show one by one information then try showInfo() function

        // get browser
        $browser = $this->showInfo('browser');

        // get browser version
        $version = $this->showInfo('version');

        // get Operating system
        $os = $this->showInfo('os');

        //get ip
        $ip = @$_SERVER['REMOTE_ADDR'];

        //date time
        $dateTime = date("Y-m-d H:i:s");

        return "Browser: $browser | Version: $version | OS: $os| IP Address: $ip | Date Click: $dateTime";
    }

    /**
     * stamp logs click
     *
     * @param $id
     * @param $detail
     * @return mixed
     */
    function stampLogs($id, $detail)
    {
        $data = array(
            'link_website_id' => $id,
            'date_click' => date("Y-m-d H:i:s"),
            'detail' => $detail,
        );
        $this->db->insert('logs_link_click', $data);
        return $id = $this->db->insert_id('logs_link_click');
    }

    private $agent = "";
    private $info = array();

    function getBrowser()
    {
        $browser = array(
            "Navigator" => "/Navigator(.*)/i",
            "Firefox" => "/Firefox(.*)/i",
            "Internet Explorer" => "/MSIE(.*)/i",
            "Google Chrome" => "/chrome(.*)/i",
            "MAXTHON" => "/MAXTHON(.*)/i",
            "Opera" => "/Opera(.*)/i",
        );
        foreach ($browser as $key => $value) {
            if (preg_match($value, $this->agent)) {
                $this->info = array_merge($this->info, array("Browser" => $key));
                $this->info = array_merge($this->info, array(
                    "Version" => $this->getVersion($key, $value, $this->agent)));
                break;
            } else {
                $this->info = array_merge($this->info, array("Browser" => "UnKnown"));
                $this->info = array_merge($this->info, array("Version" => "UnKnown"));
            }
        }
        return $this->info['Browser'];
    }

    function getOS()
    {
        $OS = array(
            "Windows" => "/Windows/i",
            "Linux" => "/Linux/i",
            "Unix" => "/Unix/i",
            "Mac" => "/Mac/i"
        );

        foreach ($OS as $key => $value) {
            if (preg_match($value, $this->agent)) {
                $this->info = array_merge($this->info, array("Operating System" => $key));
                break;
            }
        }
        return $this->info['Operating System'];
    }

    function getVersion($browser, $search, $string)
    {
        $browser = $this->info['Browser'];
        $version = "";
        $browser = strtolower($browser);
        preg_match_all($search, $string, $match);
        switch ($browser) {
            case "firefox":
                $version = str_replace("/", "", $match[1][0]);
                break;

            case "internet explorer":
                $version = substr($match[1][0], 0, 4);
                break;

            case "opera":
                $version = str_replace("/", "", substr($match[1][0], 0, 5));
                break;

            case "navigator":
                $version = substr($match[1][0], 1, 7);
                break;

            case "maxthon":
                $version = str_replace(")", "", $match[1][0]);
                break;

            case "google chrome":
                $version = substr($match[1][0], 1, 10);
        }
        return $version;
    }

    function showInfo($switch)
    {
        $switch = strtolower($switch);
        switch ($switch) {
            case "browser":
                return $this->info['Browser'];
                break;

            case "os":
                return $this->info['Operating System'];
                break;

            case "version":
                return $this->info['Version'];
                break;

            case "all" :
                return array($this->info["Version"],
                    $this->info['Operating System'], $this->info['Browser']);
                break;

            default:
                return "Unkonw";
                break;

        }
    }
}