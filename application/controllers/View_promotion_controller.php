<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class View_promotion_controller extends CI_Controller {

    public function index($provider='', $month='')
    {
        $this->ui->redirect_to_https('promotions');
        if (isset($this->session->admin)) {
            if ($provider == '' && $month =='') {
                $data['month'] = '';
            } else {
                $data['month'] = $month;
                $data['promotions'] = $this->promotion->get_by_provider_date($provider, $month);
                $data['provider'] = $this->Provider_model->get_by_id($provider)[0];
            }
            $data['providers'] = $this->Provider_model->get();
            $data['admin'] = $this->session->admin;
            $this->load->view('header');
            $this->load->view('container-top',  $data);
            $this->load->view('promotions/index', $data);
            if ($data['month'] != '') {
                $this->load->view('promotions/set');
            }
            $this->load->view('container-bottom');
        } else {
            $this->index();
        }
    }
}