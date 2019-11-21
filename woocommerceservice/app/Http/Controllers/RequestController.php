<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller 
{
    private $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $fullname = explode(" ",  $request->fullname);
        $data = [
            'payment_method' => 'bacs',
            'payment_method_title' => 'Payment on delivery',
            'set_paid' => false,
            'billing' => [
                'first_name' => $fullname[0],
                'last_name' =>  implode(" " ,array_slice($fullname,1)),
                'address_1' =>  $request->location,
                'city' => 'Accra',
                'country' => 'Ghana',
                'phone' =>  $request->phone
            ],
            'line_items' => $request->products
        ];
        $res = $this->service->order($data);
        return response()->json($res);
    }
}