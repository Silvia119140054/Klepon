<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Coba extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        // $this->load->model('Tes_Model', 'tes');
    }
    public function index_get()
    {
       $id = $this->get('id');
        if ($id == '') {
            $tes = $this->db->get('admin_tb')->result();
        } else {
            $this->db->where('id', $id);
            $tes = $this->db->get('admin_tb')->result();
        }
        $this->response($tes, REST_Controller::HTTP_OK);
    }
}