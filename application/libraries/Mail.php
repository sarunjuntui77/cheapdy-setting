<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mail {

    protected $email;
    protected $name;
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->email = 'no-reply@cheapdy.com';
        $this->name = 'Cheapdy';
    }

    public function send_coupon($coupon, $insert_id)
    {
        $data['coupon'] = $coupon;
        $data['coupon']['coupon_number'] = $insert_id;
        $subject = "Your Cheapdy's code (RefNo: $insert_id)";
        $message = $this->ci->load->view('emails-form/get_code', $data, true);
        $this->ci->email->set_mailtype("html");
        $this->ci->email->from($this->email, $this->name);
        $this->ci->email->to($coupon['coupon_email']);
        $this->ci->email->subject($subject);
        $this->ci->email->message($message);
        $email = $this->ci->email->send();
        return $email;
    }

    public function send_cancel($coupon, $insert_id)
    {
        $data['coupon'] = $coupon;
        $data['coupon']['coupon_number'] = $insert_id;
        $subject = "Your Cheapdy's code (RefNo: $insert_id)";
        $message = $this->ci->load->view('emails-form/get_code', $data, true);
        $this->ci->email->set_mailtype("html");
        $this->ci->email->from($this->email, $this->name);
        $this->ci->email->to($coupon['coupon_email']);
        $this->ci->email->subject($subject);
        $this->ci->email->message($message);
        $email = $this->ci->email->send();
        return $email;
    }
}