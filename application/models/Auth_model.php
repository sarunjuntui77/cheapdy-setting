<?php
class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_by_username_password($data)
    {
        $this->db->select(
            'admin_number,
            admin_username,
            admin_email,
            admin_role,
            admin_name,
            admin_lastname'
            );
        $this->db->where('admin_username', $data['admin_username']);
        $this->db->where('admin_password', $data['admin_password']);
        $this->db->from('admins');
        $result =  $this->db->get();
        $result = $result->result();
        return $result;
    }
}