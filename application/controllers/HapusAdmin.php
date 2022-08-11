<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class HapusAdmin extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
       $id = $this->get('id');
        if ($id != '') {
            
            $this->db->delete('admin_tb', array('adminID' => $id));
            
            $this->response('berhasil', REST_Controller::HTTP_OK);
        } else {
            $this->response('gagal', REST_Controller::HTTP_OK);
        }
        
    }
}