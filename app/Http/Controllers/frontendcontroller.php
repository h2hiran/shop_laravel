<?php

namespace App\Http\Controllers;

use App\brand;
use App\fav;
use App\frontend;
use App\menu;
use App\prodoct;
use App\sabad;
use App\slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SoapClient;

use Hekmatinasser\Verta\Verta;

class frontendcontroller extends Controller
{

    public function index()
    {

        $menu=menu::all();
        $prodoct=DB::table('prodocts')->orderBy('id', 'desc')->limit(8)->get();
        $suggestion=DB::table('prodocts')->where('suggestion','>',0)->orderBy('id', 'desc')->get();
        $special=DB::table('prodocts')->where('special','>',0)->orderBy('id', 'desc')->limit(4)->get();
        $takhfif=DB::table('prodocts')->where('takhfif','>','0')->orderBy('id', 'desc')->limit(8)->get();
        $slider=slider::orderBy('id', 'desc')->limit(3)->get();
        $brand=brand::orderBy('id', 'desc')->limit(10)->get();
        return view('frontend.index',compact('menu','prodoct','takhfif','slider','brand','suggestion','special'));
    }


    public function show($seo)
    {
        $menu=menu::all();
        $data=DB::table('prodocts')->whereSeo($seo)->get();
        $vizh=(explode(",",$data[0]->vizh));
        $dasteh1=menu::find($data[0]->dasteh1);
        $dasteh2=menu::find($data[0]->dasteh2);
        $dasteh3=menu::find($data[0]->dasteh3);
        $love=DB::table('prodocts')->whereDasteh3($data[0]->dasteh3)->limit(20)->get();
        return view('frontend.single',compact('data','menu','vizh','dasteh1','dasteh2','dasteh3','love'));
    }


    public function last()
    {
        $menu=menu::all();
        $sabad=DB::table('sabads')->limit(3)->get();
        $pro=prodoct::orderBy('id', 'desc')->paginate(18);
        return view('frontend.shop',compact('menu','sabad','pro'));
    }

    public function Bestseller()
    {

    }

    public function Discount()
    {
        $menu=menu::all();
        $sabad=DB::table('sabads')->limit(3)->get();
        $pro=prodoct::where('takhfif','>',0)->orderBy('id', 'desc')->paginate(18);
        return view('frontend.shop',compact('menu','sabad','pro'));
    }

    public function categoey($seo)
    {
        $id=menu::where('seo_menu',$seo)->first();
        if ($id->level_menu==0){
            $pro=prodoct::where('dasteh1',$id->id)->orderBy('id', 'desc')->paginate(18);
            $menu=menu::all();
            $sabad=DB::table('sabads')->limit(3)->get();
            return view('frontend.shop',compact('menu','sabad','pro'));
        }
        elseif ($id->level_menu==1) {
            $pro = prodoct::where('dasteh2', $id->id)->orderBy('id', 'desc')->paginate(18);
            $menu = menu::all();
            $sabad = DB::table('sabads')->limit(3)->get();
            return view('frontend.shop', compact('menu', 'sabad', 'pro'));
        }
        else{
            $pro = prodoct::where('dasteh3', $id->id)->orderBy('id', 'desc')->paginate(18);
            $menu = menu::all();
            $sabad = DB::table('sabads')->limit(3)->get();
            return view('frontend.shop', compact('menu', 'sabad', 'pro'));
        }
    }

    public function search(Request $request)
    {
        if ($request->search)
        Session::put('search', $request->search);
        $pro=prodoct::where('name','like','%'.session::get('search').'%')->orderBy('id', 'desc')->paginate(18);
        $sabad = DB::table('sabads')->limit(3)->get();
        $menu = menu::all();
        return view('frontend.shop', compact('menu', 'sabad', 'pro'));
    }

    public  function about()
    {
        $menu=menu::all();
        return view('frontend.about',compact('menu'));
    }

    public function test()
    {
        $time = brand::find(1);
//       return $time->created_at->timestamp;
        $v = new Verta(1563932737);
        return $v;
    }


}
