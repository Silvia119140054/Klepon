<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Logins extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        // $this->load->model('Tes_Model', 'tes');
    }
    function index_post()
    {
        $email = $this->post('email');
        $pass = $this->post('pass');
        
        $hasil = $this->db->get_where('admin_tb', array('email' => $email, 'password' => $pass))->num_rows();;
        
        if($hasil > 0){
            $data = $this->db->get_where('admin_tb', array('email' => $email, 'password' => $pass))->result();
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $this->response();
        }
        
        // $insert = $this->db->insert('produk', $data);
        // if ($insert) {
        //     $this->response($data, REST_Controller::HTTP_OK);
        // } else {
        //     $this->response(array('status' => 'fail', 502));
        // }
    }
}