<?php

class Upload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        //echo APPPATH;
        //var_dump($_SERVER['SCRIPT_FILENAME']);
        //var_dump(is_dir('/upload/'));
        $this->load->view('upload_form', array('error' => ' '));
    }

    function do_upload()
    {
        //check path แล้วสร้าง folder
        $result = $this->createFolder();

        //ตั้งชื่อใหม่
        $fileParts = pathinfo($_FILES['userfile']['name']);
        $newName = 'Latenda House-'.date("YmdHis") . ".". $fileParts['extension'];
        $_FILES['userfile']['name'] = $newName;

        if (!is_dir("web/images/uploads/products/$result")) {
            echo "Path fail";
        } else {

            $config['upload_path'] = "web/images/uploads/products/$result";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            /*if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }*/
            if (!$this->upload->do_upload()) {
                echo $error = $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                //$result = move_uploaded_file($data['full_path'], $targetFile);
                echo "$result/" . $data['file_name'];
            }
        }
    }

    public function createFolder()
    {
        $folderName = date("Y-m-d");
        $pathFolder = "web/images/uploads/products/$folderName";
        if (!is_dir($pathFolder)) //create the folder if it's not already exists
        {
            $flgCreate = mkdir($pathFolder, 0777, true);
            if (!$flgCreate) {
                return "Create False";
            }
        }
        return $folderName;
    }
}

?>