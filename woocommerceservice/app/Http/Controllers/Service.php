<?php 

namespace App\Http\Controllers;

use Automattic\WooCommerce\Client;

class Service
{
    private $woocommerce; 
    public function __construct()
    {
        $this->woocommerce = new Client(
            'https://lojaanor.profishgh.com',
            'ck_3f44beb1f6132c4b2d7c53075eb6fc7784ca21e3',
            'cs_1a9289fe7fe99063f649c5f84d72039eee5d1702',
            [
                'wp_api' => true,
                'version' => 'wc/v3'
            ]
        );
    }

    public function order(array $data)
    {
        return $this->woocommerce->post('orders', $data);
    }
}