<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class GetAdmin extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
       $id = $this->get('id');
        if ($id == '') {
            
            $this->db->order_by("adminID", "desc");
            $tes = $this->db->get('admin_tb')->result();
            
        } else {
            $this->db->where('adminID', $id);
            $tes = $this->db->get('admin_tb')->result();
        }
        $this->response($tes, REST_Controller::HTTP_OK);
    }
}