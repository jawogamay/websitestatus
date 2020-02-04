<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Ixudra\Curl\Facades\Curl;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getHosting1(){
         $response = Curl::to('http://newreadermedia.net/')
                            ->withResponseHeaders()
                             ->returnResponseObject()
                            ->get();
        $headers = $response->headers;
        if($response->status>200){
             $data = array('name'=>"Test");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('bryan.asprer@newreadermagazine.com', 'New Reader')->subject
            ('Website Having Problem');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
        }
        return $response->status;
       
    }
        public function getHosting2(){
         $response = Curl::to('https://www.newreadermagazine.net/')
                            ->withResponseHeaders()
                             ->returnResponseObject()
                            ->get();
       
        if($response->status>200){
             $data = array('name'=>"Test");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('bryan.asprer@newreadermagazine.com', 'New Reader')->subject
            ('Website Having Problem');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
        }
        return $response->status;
       
    }

}
