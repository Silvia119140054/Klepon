<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class GetBerita extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
       $id = $this->get('id');
       $tgl = $this->get('tgl');
       $sumber = $this->get('sumber');
        if ($id == '' && $tgl == '' && $sumber == '') {
            
            $this->db->select('beritaId, judul, tanggalBerita, foto, sumber');
            $this->db->from('berita_tb');
            $this->db->join('sumber_berita_tb', 'berita_tb.idSumber = sumber_berita_tb.idSumber');
            $this->db->order_by("beritaId", "desc");
            
            $tes = $this->db->get()->result();
        } elseif($id == '' && $tgl != '' && $sumber != ''){
            
            $wh = array('tanggalBerita' => $tgl, 'berita_tb.idSumber' => $sumber);
            $this->db->where($wh); 
            
            $this->db->select('beritaId, judul, tanggalBerita, foto, sumber');
            $this->db->from('berita_tb');
            $this->db->join('sumber_berita_tb', 'berita_tb.idSumber = sumber_berita_tb.idSumber');
            $this->db->order_by("beritaId", "desc");
            
            $tes = $this->db->get()->result();
        }elseif($id == '' && $tgl == '' && $sumber != ''){
            
            $wh = array('berita_tb.idSumber' => $sumber);
            $this->db->where($wh); 
            
            $this->db->select('beritaId, judul, tanggalBerita, foto, sumber');
            $this->db->from('berita_tb');
            $this->db->join('sumber_berita_tb', 'berita_tb.idSumber = sumber_berita_tb.idSumber');
            $this->db->order_by("beritaId", "desc");
            
            $tes = $this->db->get()->result();
        }elseif($id == '' && $tgl != '' && $sumber == ''){
            
            $wh = array('tanggalBerita' => $tgl);
            $this->db->where($wh); 
            
            $this->db->select('beritaId, judul, tanggalBerita, foto, sumber');
            $this->db->from('berita_tb');
            $this->db->join('sumber_berita_tb', 'berita_tb.idSumber = sumber_berita_tb.idSumber');
            $this->db->order_by("beritaId", "desc");
            
            $tes = $this->db->get()->result();
        } else {
            $this->db->where('beritaId', $id);
            $tes = $this->db->get('berita_tb')->result();
        }
        $this->response($tes, REST_Controller::HTTP_OK);
    }
}