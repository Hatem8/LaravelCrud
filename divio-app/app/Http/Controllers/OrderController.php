<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function create(){
        //get the user email
        $email = '7aateem183@gmail.com';
        //Get the order data 
        
        $data = [
            'price' => '200',
            'number' => '65qw-2h-n1',
            'products' => ['mobile','laptop','airpods'],
        ];

        DB::transaction(function() use ($email,$data){
            //create order 

            Mail::to($email)->send(new OrderCreatedMail($data));
        });
    }
}
