<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_admin_controller extends CI_Controller {

    public function api_login()
    {
        if (isset($_POST)) {
            echo $this->auth->login($_POST);
        } else {
            echo "WHAT ?";
        }
    }

    public function api_logout()
    {
        if (isset($_POST['logout'])) {
            $this->auth->detroy_session();
            echo "SUCCESS";
        } else {
            echo "FAILED";
        }
    }
}