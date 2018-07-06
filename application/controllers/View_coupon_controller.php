<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_coupon_controller extends CI_Controller {

    public function index()
    {
        $this->ui->redirect_to_https('admin');
        if (isset($this->session->admin)) {
            $data['admin'] = $this->session->admin;
            $this->load->view('header');
            $this->load->view('container-top', $data);
            $this->load->view('index', $data);
            $this->load->view('container-bottom');
        } else {
            $this->load->view('header');
            $this->load->view('login');
        }
    }
}