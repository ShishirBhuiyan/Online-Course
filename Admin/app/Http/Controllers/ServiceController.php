<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // This function return Admin->service.blade.php File
    function ServiceIndex(){
        return view('Service');
    }

    // Show all service data from database
    function GetServiceData(){
        $serviceData = json_encode(Service::orderBy('id','DESC')->get(),true);
        // return getting data who send request to do this. That is script getServiceData() meathoad.
        return $serviceData;
    }


    // Add New Service
    function addService(Request $request){
        // Access sending Request Data
        $name = $request->input('name');
        $des = $request->input('des');
        $img = $request->input('img');
        
        // Insert Data
        $result = Service::insert(['service_name'=>$name,'service_des'=>$des,'service_img'=>$img]);
        
        // If Data insert properly
        if($result==true){
            return 1;// return which function send request
        }else{
            return 0;
        }
    }
}
