<?php

namespace App\Http\Controllers;

use App\admin;
use App\prodoct;
use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class admincontroller extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('admin.dashboard');
    }


    public function we()
    {
        $data=prodoct::all();
        $status='we';
        return view('admin.setting',compact('data','status'));
    }

    public function spe()
    {
        $data=prodoct::all();
        $status='spe';
        return view('admin.setting',compact('data','status'));
    }

    public function store($status,$id,$active)
    {

       if ($status==1){
           if ($active==1)
           prodoct::where('id',$id)->update(['suggestion'=>1]);
           else
               prodoct::where('id',$id)->update(['suggestion'=>0]);
           return redirect()->back();
       }
       else
       {
           if ($active==1)
               prodoct::where('id',$id)->update(['special'=>1]);
           else
               prodoct::where('id',$id)->update(['special'=>0]);
           return redirect()->back();
       }
    }


}
