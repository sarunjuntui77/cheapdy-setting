<?php
class Provider_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $this->db->from('providers');
        $result =  $this->db->get();
        $result =  $result->result();
        return $result;
    }

    function get_by_id($id)
    {
        $this->db->from('providers');
        $this->db->where('provider_id',$id);
        $result =  $this->db->get();
        $result =  $result->result();
        return $result;
    }

    function insert($data)
    {
        return  $this->db->insert('providers', $data);
    }

    function delete($id)
    {
        return  $this->db->delete('providers', [
            'provider_id' => $id
        ]);
    }

    function update($data)
    {
        return  $this->db->update('providers', $data, [
            'provider_id' => $data['provider_id']
        ]);
    }
}
