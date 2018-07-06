<?php
class Promotion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insert($data)
    {
        return  $this->db->insert('promotions', $data);
    }

    function update($data)
    {
        return  $this->db->update('promotions', $data, array(
            'promotion_number' => $data['promotion_number']
        ));
    }

    function insert_multi($data)
    {
        return  $this->db->insert_batch('promotions', $data);
    }

    function get_promotion($number)
    {
        $this->db->where('promotion_number', $number);
        $result = $this->db->get('promotions');
        $result = $result->result();
        $result = $result[0];
        return $result;
    }

    function get_by_provider_date($provider)
    {
        $date = date('Y-m-d');
        $this->db->where('provider_id', $provider);
        $this->db->where('promotion_date', $date);
        $result = $this->db->get('promotions');
        $result = $result->result();
        return $result;
    }

    function get_by_provider_month($provider, $month)
    {
        $this->db->where('provider_id', $provider);
        $this->db->like('promotion_date', $month);
        $result = $this->db->get('promotions');
        $result = $result->result();
        return $result;
    }

    function get_quota($number)
    {
        $this->db->select('promotion_qty');
        $this->db->where('promotion_number', $number);
        $result = $this->db->get('promotions');
        $result = $result->result();
        $result = $result[0]->promotion_qty;
        return $result;
    }

    function update_qty($number)
    {
        $this->db->set('promotion_qty', 'promotion_qty - 1', FALSE);
        $this->db->where('promotion_number', $number);
        return $this->db->update('promotions');
    }
}