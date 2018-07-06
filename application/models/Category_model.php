<?php
class Category_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $this->db->from('categories');
        $result =  $this->db->get();
        $result =  $result->result();
        return $result;
    }

    function get_by_id($id)
    {
        $this->db->from('categories');
        $this->db->where('category_id',$id);
        $result =  $this->db->get();
        $result =  $result->result();
        return $result;
    }

    function insert($data)
    {
        return  $this->db->insert('categories', $data);
    }

    function update($data)
    {
        return  $this->db->update('categories', $data, [
            'category_id' => $data['category_id']
        ]);
    }

    function delete($id)
    {
        return  $this->db->delete('categories', [
            'category_id' => $id
        ]);
    }
}
