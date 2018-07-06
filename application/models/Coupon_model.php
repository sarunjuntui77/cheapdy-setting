<?php
class Coupon_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get($limit)
    {
        $this->db->from('coupons');
        $this->db->order_by('coupon_number', 'DESC');
        $this->db->limit($limit);
        $result = $this->db->get();
        $result = $result->result();
        return $result; 
    }

    function insert_coupon($coupon)
    {
        return $this->db->insert('coupons',$coupon); 
    }

    function check_coupon_by_ip($ip)
    {
        $date = date('Y-m-d');
        $this->db->where('coupon_ip', $ip);
        $this->db->where('coupon_date', $date);
        $this->db->from('coupons');
        return $this->db->count_all_results(); 
    }

    function check_code($code, $email)
    {
        $date = date('Y-m-d');
        $this->db->where('coupon_code', $code);
        $this->db->where('coupon_date', $date);
        $this->db->from('coupons');
        return $this->db->count_all_results(); 
    }

    function check_quota_email_by_date($email)
    {
        $date = date('Y-m-d');
        $this->db->where('coupon_date', $date);
        $this->db->where('coupon_email', $email);
        $this->db->from('coupons');
        return $this->db->count_all_results(); 
    }

    function check_quota_email_by_promotion($email, $number)
    {
        $date = date('Y-m-d');
        $this->db->where('coupon_date', $date);
        $this->db->where('coupon_email', $email);
        $this->db->where('promotion_number', $email);
        $this->db->from('coupons');
        return $this->db->count_all_results(); 
    }

    function get_by_encrypt_number($encrypt, $number)
    {
        $this->db->from('coupons');
        $this->db->where('coupon_encrypt', $encrypt);
        $this->db->where('coupon_number', $number);
        $result = $this->db->get();
        $result = $result->result();
        return $result; 
    }

    function update_status($coupon, $status)
    {
        $this->db->where('coupon_number', $coupon->coupon_number);
        $set = array(
            'coupon_status' => $status
        );
        $result = $this->db->update('coupons', $set);
        return $result; 
    }

}