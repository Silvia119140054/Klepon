<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class KonfirOtp extends REST_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index_get()
    {
      $otp = $this->get('otp');
      $email = $this->get('email');
            
        
      $hasil = $this->db->get_where('otp_tb', array('email' => $email, 'otp' => $otp))->num_rows();;
        
        if($hasil > 0){
            // $this->response('berhasil', REST_Controller::HTTP_OK);
            echo 'berhasil';
        }else{
            $this->response('gagal', REST_Controller::HTTP_OK);
        } 
    }
}