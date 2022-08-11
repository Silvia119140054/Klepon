<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class GantiPassword extends REST_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index_get()
    {
      $pass = $this->get('pass');
      $email = $this->get('email');
            
        
      $this->db->set('password', $pass);
      $this->db->where('email', $email);
      $this->db->update('admin_tb'); 
      
      $this->db->delete('otp_tb', array('email' => $email));
      
      $this->response('berhasil', REST_Controller::HTTP_OK);
    }
}