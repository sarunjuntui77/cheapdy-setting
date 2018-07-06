<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_provider_controller extends CI_Controller {

    public function index()
    {
        $this->ui->redirect_to_https('providers');
        if (isset($this->session->admin)) {
            $data['providers'] = $this->Provider_model->get();
            $data['categories'] = $this->Category_model->get();
            $data['admin'] = $this->session->admin;
            $this->load->view('header');
            $this->load->view('container-top', $data);
            $this->load->view('providers/index', $data);
            $this->load->view('container-bottom');
        } else {
            $this->view_index();
        }
    }

    public function categories()
    {
        $this->ui->redirect_to_https('providers');
        if (isset($this->session->admin)) {
            $data['categories'] = $this->Category_model->get();
            $data['admin'] = $this->session->admin;
            $this->load->view('header');
            $this->load->view('container-top', $data);
            $this->load->view('categories/index', $data);
            $this->load->view('container-bottom');
        } else {
            $this->view_index();
        }
    }
}
