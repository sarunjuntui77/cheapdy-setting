<?php
class Member_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get($data)
    {
        $this->db->from('members');
        $this->db->order_by('member_number', 'DESC');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
    }

    function insert($data)
    {
        return  $this->db->insert('members', $data);
    }

    function update($data)
    {
        return  $this->db->update('members', $data, array(
            'member_number' => $data['member_number']
        ));
    }

    function delete($data)
    {
        return  $this->db->delete('members', array(
            'member_number' => $data['member_number']
        ));
    }

    function get_by_id($data)
    {
        $this->db->from('members');
        $this->db->where('member_number', $data['member_number']);
        $result = $this->db->get();
        $result = $result->result();
        return $result[0];
    }
}