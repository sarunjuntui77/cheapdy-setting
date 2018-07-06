<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Provider {
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function add_provider($data)
    {
        $category = explode('|', $data['category']);
        $data['category_id'] = $category[0];
        $data['category_name'] = $category[1];
        $data['provider_region'] = 'เชียงใหม่';
        $data['provider_gallery'] = implode(',', $data['provider_gallery']);
        unset($data['_wysihtml5_mode']);
        unset($data['category']);
        $insert = $this->ci->Provider_model->insert($data);
        $result = 'FAILED';
        if($insert) {
            $result = 'SUCCESS';
        }
        return $result;
    }

    public function update_provider($data)
    {
        $category = explode('|', $data['category']);
        $data['category_id'] = $category[0];
        $data['category_name'] = $category[1];
        $data['provider_region'] = 'เชียงใหม่';
        $data['provider_gallery'] = array_filter($data['provider_gallery']);
        $data['provider_gallery'] = implode(',', $data['provider_gallery']);
        unset($data['_wysihtml5_mode']);
        unset($data['category']);
        $update = $this->ci->Provider_model->update($data);
        $result = 'FAILED';
        if($update) {
            $result = 'SUCCESS';
        }
        return $update;
    }


    public function add_category($data)
    {
        $insert = $this->ci->Category_model->insert($data);
        $result = 'FAILED';
        if($insert) {
            $result = 'SUCCESS';
        }
        return $result;
    }

}