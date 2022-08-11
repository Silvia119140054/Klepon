<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class SendOtp extends REST_Controller {

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index_get()
    {
      $email = $this->get('email');
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'appklepon@gmail.com',  // Email gmail
            'smtp_pass'   => 'kfyrvxljczfjbfaf',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('appklepon@gmail.com', 'Klepon App');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Kode OTP | App Klepon');
        
        $this->db->delete('otp_tb', array('email' => $email));

        $otp = mt_rand(1000,9999);

        $dataOtp = array(
            'email' => $email,
            'otp' => $otp,
        );
            
        $this->db->insert('otp_tb',$dataOtp);

        // Isi email
        $this->email->message("Berikut kode otp anda: " . $otp);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses!';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}