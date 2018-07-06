<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_member_controller extends CI_Controller {

    public function add_member()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->member->add_member($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function update_member()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->member->update_member($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function delete_member()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->member_model->delete($_POST);
            if ($result == 1) {
                echo "SUCCESS";
            } else {
                echo "FAILED";
            }
        } else {
            echo "FAILED";
        }
    }

    public function update_form()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $data['providers'] = $this->Provider_model->get();
            $data['member'] = $this->member_model->get_by_id($_POST);
            $this->load->view('admin/members/form-update', $data);
        } else {
            echo "FAILED";
        }
    }
}