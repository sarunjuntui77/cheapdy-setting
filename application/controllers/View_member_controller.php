<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_member_controller extends CI_Controller {

    public function index($limit=30)
    {
        $this->ui->redirect_to_https('members');
        if (isset($this->session->admin)) {
            $limit = ($limit == 'all') ? 'all' : $limit;
            $data['members'] = $this->member_model->get(30);
            $data['providers'] = $this->Provider_model->get();
            $data['admin'] = $this->session->admin;
            $this->load->view('header');
            $this->load->view('container-top', $data);
            $this->load->view('members/index', $data);
            $this->load->view('container-bottom');
        } else {
            $this->index();
        }
    }
}