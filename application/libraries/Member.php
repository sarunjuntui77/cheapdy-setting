<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member {
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function add_member($data)
    {
        $data['member_password'] = md5($data['member_password']);
        $insert = $this->ci->member_model->insert($data);
        $result = 'FAILED';
        if($insert == 1) {
            $result = 'SUCCESS';
        }
        return $result;
    }

    public function update_member($data)
    {
        $insert = $this->ci->member_model->update($data);
        $result = 'FAILED';
        if($insert == 1) {
            $result = 'SUCCESS';
        }
        return $result;
    }
}