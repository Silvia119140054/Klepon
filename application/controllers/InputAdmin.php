<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class InputAdmin extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        // $this->load->model('Tes_Model', 'tes');
    }
    function index_post()
    {
        $nama = $this->post('nama');
        $email = $this->post('email');
        $password = $this->post('password');
        
        if ($nama != '' && $email != '' && $password != '') {
            
            $dataAdmin = array(
            	'nama' => $nama,
            	'email' => $email,
            	'password' => $password,
            );
            
            $this->db->insert('admin_tb',$dataAdmin);
            
            $this->response('berhasil', REST_Controller::HTTP_OK);
            
        } else {
            
            $error = array('error' => $this->upload->display_errors());
            $this->response('gagal', REST_Controller::HTTP_OK);
        }
    }
}