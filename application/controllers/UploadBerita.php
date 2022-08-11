<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class UploadBerita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //inisialisasi model Produk_model.php dengan nama produk
        // $this->load->model('Tes_Model', 'tes');
    }
    function index_post()
    {
        $idSumber = $this->post('idSumber');
        $judul = $this->post('judul');
        $tgl = $this->post('tgl');
        $foto = $this->post('image');
        $image = $_FILES['foto']['tmp_name'];
        
        $config['upload_path'] = './images/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = 2000;
        // $config['max_width'] = 1500;
        // $config['max_height'] = 1500;

        $this->load->library('upload', $config);
        $nama = './images/' . $_FILES['foto']['name'];
        $namaFoto = $_FILES['foto']['name'];
        if (!move_uploaded_file($image,$nama)) {
            $error = array('error' => $this->upload->display_errors());
            $this->response('gagal', REST_Controller::HTTP_OK);
            // $error = array('error' => $this->upload->display_errors());
        } else {
            
            $dataBerita = array(
            	'judul' => $judul,
            	'idSumber' => $idSumber,
            	'tanggalBerita' => $tgl,
            	'foto' => $namaFoto,
            );
            
            $this->db->insert('berita_tb',$dataBerita);
            
            $this->response('berhasil', REST_Controller::HTTP_OK);
        }
    }
}