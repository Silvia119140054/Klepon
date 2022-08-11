<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class SumberBerita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        // $this->load->model('Tes_Model', 'tes');
    }
    function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $this->db->order_by("idSumber", "asc");
            $tes = $this->db->get('sumber_berita_tb')->result();
        } else {
            $this->db->where('idSumber', $id);
            $tes = $this->db->get('sumber_berita_tb')->result();
        }
        $this->response($tes, REST_Controller::HTTP_OK);
    }
}