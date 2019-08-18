<?php

namespace App\Http\Controllers;

use App\karbar;
use App\menu;
use App\prodoct;
use App\sabad;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SoapClient;

class karbarcontroller extends Controller
{


    public function index()
    {
//        if(session('login'))
//            return redirect('/');
        $menu=menu::all();
        return view('frontend.user.user_login',compact('menu'));
    }


    public function store(Request $request)
    {

        if (isset($_POST['btnregister'])) {
            $this->validate($request, [
                'name' => 'required',
                'family' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'pass' => 'required',
            ]);

            $karbar = new karbar();
            $karbar->name = $request->name;
            $karbar->family = $request->family;
            $karbar->email = $request->email;
            $karbar->mobile = $request->mobile;
            $karbar->pass = $request->pass;
            $karbar->save();


            if(Cart::count()!=0){
                foreach (Cart::content() as $value){
                    $sabad=new sabad();
                    $sabad->karbar_id=$karbar->id;
                    $sabad->qty=$value->qty;
                    $sabad->prodoct_id=$value->id;
                    $sabad->save();
                }
            }


            session::put('login', $karbar->id);
            session::put('karbar_name', $request->name . ' ' . $request->family);
            return redirect('/');
        }

        elseif (isset($_POST['btnlogin'])){

            $this->validate($request, [
                'email' => 'required',
                'pass' => 'required',
            ]);


            $karbar=karbar::where('email',$request->email)->where('pass',$request->pass)->first();
            if ($karbar)
            {
                if(Cart::count()!=0){

                    foreach (Cart::content() as $value){
                        $sabad=new sabad();
                        $sabad->karbar_id=$karbar->id;
                        $sabad->qty=$value->qty;
                        $sabad->prodoct_id=$value->id;
                        $sabad->save();
                    }
                    Cart::destroy();
                }

                $sabad=sabad::where('karbar_id',$karbar->id)->get();

                foreach ($sabad as $value){
                    $prodoct=prodoct::find($value->prodoct_id);

                    $data['id']= $prodoct->id;
                    if ($prodoct->takhfif>0)
                        $data['price']= $prodoct->takhfif;
                    else
                        $data['price']= $prodoct->gheymat;
                    $data['name']=$prodoct->name;
                    $data['options']['img']=$prodoct->pic;
                    $data['qty']= $value->qty;
                    Cart::add($data);
                }




                session::put('login', $karbar->id);
                session::put('karbar_name', $karbar->name . ' ' . $karbar->family);
                return redirect('/');
            }

            else
                {
                session::flash('error','نام کاربری یا رمز اشتباه است');
                return redirect()->back();
            }
        }
    }


    public function show()
    {
        if(! session('login'))
            return redirect('/account-login');
        $menu=menu::all();
        return view('frontend.user.account',compact('menu'));
    }

    public function destroy(karbar $karbar)
    {
        session::flush();
        return redirect('/');
    }

    public function profile()
    {
        if(! session('login'))
            return redirect('/account-login');
        $menu=menu::all();
        $user=karbar::find(\session('login'));
        return view('frontend.user.profile',compact('menu','user'));
    }

    public function profile_change(Request $request)
    {
        $karbar=karbar::find( session::get('login'));

        if ($request->name!=null)
            $name=$request->name;
        else
            $name=$karbar->name;


        if ($request->family!=null)
            $family=$request->family;
        else
            $family=$karbar->family;


        if ($request->mobile!=null)
            $mobile=$request->mobile;
        else
            $mobile=$karbar->mobile;


        if ($request->pass!=null)
            $pass=$request->pass;
        else
            $pass=$karbar->pass;

        karbar::where('id', session::get('login'))
            ->update([

                'name' => $name,
                'family' => $family,
                'mobile' => $mobile,
                'pass' => $pass,
            ]);
        session::put('karbar_name', $name . ' ' . $family);
        return redirect()->back();

    }

    public  function orders()
    {
        if(! session('login'))
            return redirect('/account-login');
        $menu=menu::all();
        $order=sabad::where('karbar_id',session::get('login'))->get();
        $user=karbar::find(\session('login'));
        return view('frontend.user.orders',compact('menu','user','order'));
    }

    public function cart()
    {
        if(! session('login'))
            return redirect('/account-login');
        $menu=menu::all();
        return view('frontend.sabad.cart',compact('menu'));
    }

    public function update_sabad(Request $request)
    {
        if(! session('login'))
            return redirect('/account-login');
        $arr=$request->toArray();
        foreach (Cart::content() as $val){
            if (array_key_exists($tt=$val->rowId,$arr)){
                Cart::update($val->rowId,$request->$tt);
            }
        }
        return redirect()->back();
    }

    public function wishlist()
    {
        if(! session('login'))
            return redirect('/account-login');
        $menu=menu::all();
        $user=karbar::find(\session('login'));
        $fav=DB::table('karbar_prodoct')->where('karbar_id',session::get('login'))->get();
        return view('frontend.user.wishlist',compact('menu','user','fav'));
    }

    public function checkout()
    {
        if(! session('login'))
            return redirect('/account-login');
        $total=0;

        foreach (Cart::content() as $value)
        {
            $total=$total+(($value->price)*($value->qty));
        }


        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
        $Amount = $total; //Amount will be based on Toman - Required
        $Description = 'www.zabanbooks.com'; // Required
        $Email = 'UserEmail@Mail.Com'; // Optional
        $Mobile = '09359762744'; // Optional
        $CallbackURL = route('callback'); // Required



        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );



        if ($result->Status == 100) {

            ob_end_clean();
            header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
            exit;

        } else {
            echo'ERR: '.$result->Status;
        }
    }


    public function callback()
    {
        $total = 0;

        foreach (Cart::content() as $value) {
            $total = $total + (($value->price) * ($value->qty));
        }


        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
        $Amount = $total; //Amount will be based on Toman
        $Authority = $_GET['Authority'];

        if ($_GET['Status'] == 'OK') {

            $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                    'Amount' => $Amount,
                ]
            );

            if ($result->Status == 100)
            {
               return redirect('complete');
//                echo 'Transaction ghghghghh. RefID:' . $result->RefID;
            }
            else
            {
                echo 'Transaction failed. Status:' . $result->Status;
            }
        } else {

            echo 'Transaction canceled by user';
        }

    }

    public function complete()
    {

        $peygiri=mt_rand(1000,99999);
        sabad::where('karbar_id',session::get('login'))->update(['status'=>1,'peygiri'=>$peygiri]);
        $menu=menu::all();
        return view('frontend.end',compact('menu','peygiri'));
    }


}
