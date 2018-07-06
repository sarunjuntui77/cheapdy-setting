<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_promotion_controller extends CI_Controller {

    public function create_promotions()
    {
        if (isset($_POST) && isset($this->session->admin)) {
            $result = $this->promotion->create_promotion($_POST);
            echo $result;
        } else {
            echo "FAILED";
        }
    }

}