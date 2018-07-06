<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_provider_controller extends CI_Controller {

    public function add_provider()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->provider->add_provider($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function update_provider()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->provider->update_provider($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function add_category()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->provider->add_category($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function update_category()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->Category_model->update($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function edit_provider()
    {
        if (isset($_GET) && isset($this->session->admin)) {
            $data['provider'] = $this->Provider_model->get_by_id($_GET['id'])[0];
            $data['categories'] = $this->Category_model->get();
            $this->load->view('providers/edit', $data);
        } else {
            echo "FAILED";
        }
    }

    public function edit_category()
    {
        if (isset($_GET) && isset($this->session->admin)) {
            $data['category'] = $this->Category_model->get_by_id($_GET['id'])[0];
            $this->load->view('categories/edit', $data);
        } else {
            echo "FAILED";
        }
    }

    public function delete_provider()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->Provider_model->delete($_POST['id']);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

    public function delete_category()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->Category_model->delete($_POST['id']);
            echo $result;
        } else {
            echo "FAILED";
        }
    }
}
