<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth {

    protected $ci;
    protected $expiration;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function login($data)
    {
        $respone = '';
        $user = array(
            'admin_username' => $data['username'],
            'admin_password' => md5($data['password'])
            );

        $result = $this->ci->auth_model->get_by_username_password($user);
        if (isset($result[0])) {
            $this->set_session($result[0]);
            $respone = 'SUCCESS';
        } else {
            $respone = 'FAILED';
        }
        return $respone;
    }

    public function set_session($data)
    {
        $auth = array(
            'admin' => array(
                'NUMBER' => $data->admin_number,
                'USERNAME' => $data->admin_username,
                'NAME' => $data->admin_name,
                'LASTNAME' => $data->admin_lastname,
                'EMAIL' => $data->admin_email,
                'ROLE' => $data->admin_role,
                )
            );
        $this->ci->session->set_userdata($auth);
    }

    public function detroy_session()
    {
        $this->ci->session->unset_userdata('admin');
    }

}