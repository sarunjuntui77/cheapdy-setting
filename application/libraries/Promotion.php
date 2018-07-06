<?php
use DusanKasan\Knapsack\Collection;
defined('BASEPATH') OR exit('No direct script access allowed');
class Promotion {
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }

    function get_by_provider_date($provider, $month)
    {
        $promotions = $this->ci->promotion_model->get_by_provider_month($provider, $month);
        $array = json_decode(json_encode($promotions), True);
        $promotions = Collection::from($array)
        ->groupByKey('promotion_date')
        ->map('DusanKasan\Knapsack\toArray')
        ->toArray();
        return $promotions;
    }

    function parse_to_table($item)
    {
        $new = array();
        $new['promotion_title'] = isset($item->promotion_title) ? $item->promotion_title : '';
        $new['promotion_desc'] = isset($item->promotion_desc) ? $item->promotion_desc : '';
        $new['promotion_dis_price'] = isset($item->promotion_desc) ? $item->promotion_dis_price : '';
        $new['promotion_max_qty'] = isset($item->promotion_desc) ? $item->promotion_max_qty : '';
        $new['promotion_number'] = isset($item->promotion_number) ? $item->promotion_number : '';
        $new['promotion_image_url'] = isset($item->promotion_image_url) ? $item->promotion_image_url : '';
        $new = json_decode(json_encode($new));
        return $new;
    }

    function create_promotion($data)
    {
        $data = $this->parse_multi($data);
        $process = $this->process_create_promotion($data);
        return json_encode($process);
    }

    function process_create_promotion($data)
    {
        $process = array(); 
        $process['none'] = 0;
        $process['insert'] = 0;
        $process['update'] = 0;
        $process['error'] = 0;
        foreach ($data as $key => $value) {
            if ($value['promotion_number'] == '') {
                unset($value['promotion_number']);
                if ($value['promotion_title'] != '') {
                    $insert =  $this->ci->promotion_model->insert($value);
                    if ($insert == 1){
                        $process['insert'] += 1;
                    } else {
                        $process['error'] += 1;
                    }
                } else {
                    $process['none'] += 1;
                }
            } else {
                unset($value['create_datetime']);
                $update = $this->ci->promotion_model->update($value);
                if ($update == 1){
                    $process['update'] += 1;
                } else {
                    $process['error'] += 1;
                }
            }
        }
        return $process;
    }

    function parse_multi($data)
    {
        $parse_data = array();
        foreach ($data['date'] as $i => $value) {
            $item = array();
            $date = date('Y-m-d H:i:s');
            $item['promotion_number'] = $data['number'][$i];
            $item['promotion_title'] = $data['title'][$i];
            $item['promotion_desc'] = $data['desc'][$i];
            $item['promotion_dis_price'] = $data['dis'][$i];
            $item['promotion_qty'] = $data['qty'][$i];
            $item['promotion_max_qty'] = $data['qty'][$i];
            $item['promotion_date'] = $data['date'][$i];
            $item['promotion_exp'] = '';
            $item['promotion_image_url'] = $data['image'][$i];
            $item['provider_id'] = $data['provider_id'][$i];
            $item['provider_name'] = $data['provider_name'][$i];
            $item['provider_category'] = $data['provider_category'][$i];
            $item['provider_region'] = $data['provider_region'][$i];
            $item['create_datetime'] = $date;
            $item['update_datetime'] = $date;
            array_push($parse_data, $item);
        }
        return $parse_data;
    }

    function add_zero_date($date)
    {
        $text = ($date < 10)? '0'.$date:  $date;
        return $text;
    }
}