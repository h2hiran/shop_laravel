<?php

namespace App\Http\Controllers;


use App\menu;
use App\prodoct;
use App\sabad;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ajaxcontroller extends Controller
{
    public function index(Request $request)
    {
        $data=menu::where('parent_menu',$request->id)->get();
        $option=null;
        foreach ($data as $value)
        {
            $option.='<option value="'.$value->id.'">'.$value->name_menu.'</option>';
        }
        return $option;
    }

    public function index2(Request $request)
    {
        $data=menu::where('parent_menu',$request->id)->get();
        $option=null;
        foreach ($data as $value)
        {
            $option.='<option value="'.$value->id.'">'.$value->name_menu.'</option>';
        }
        return $option;
    }


    public function sabad(Request $request){

        $prodoct=prodoct::where('id',$request->id)->get();
        $dataa=$prodoct[0];

        if ($dataa->takhfif>0)
            $gheymat=$dataa->takhfif;
        else
            $gheymat=$dataa->gheymat;


        $data['id']= $dataa->id;
        $data['price']= $gheymat;
        $data['name']=$dataa->name;
        $data['options']['img']=$dataa->pic;
        $data['qty']= 1;

        Cart::add($data);


        if (session::get('login')){
            $qty=null;

            if ($qty=sabad::where('karbar_id',session::get('login'))->where('prodoct_id',$dataa->id)->first())
            {

                sabad::where('karbar_id',session::get('login'))->where('prodoct_id',$dataa->id)->update(['qty'=>$qty->qty+1]);
            }
            else
            {
                $sabad=new sabad();
                $sabad->karbar_id=session::get('login');
                $sabad->prodoct_id=$dataa->id;
                $sabad->qty=1;
                $sabad->save();
            }
        }



        $view='';

        foreach(Cart::content() as $val){
           $row="'$val->rowId'";
           $view.='<i class="featured-product">';
           $view.='<div class="featured-product-thumb"><img src="/img/prodoct/'.$val->options->img.'" alt="Product Image"/></div>';
           $view.='<div class="featured-product-info">';
           $view.='<h5 class="featured-product-title">'.$val->name.'</h5><span class="featured-product-price">'.number_format($val->price).' تومان &#215; '.$val->qty.'</span>';
           $view.='</div>';
           $view.='<span class="remove-product">';
           $view.='<i href="#" onclick="remove_sabad('.$row.')" class="fe-icon-x"></i>';
           $view.='</span></i>';
        }
        if(Cart::count()!=0) {
            $view .= '<hr class="mt-3 mb-3">';
            $view .= ' <span class="text-sm text-muted">قیمت کل: &nbsp;</span><strong>'.Cart::subtotal().'  تومان</strong>';
            $view .= '<div class="d-flex justify-content-between pt-3"><a class="btn btn-primary btn-block btn-sm ml-2" href="/cart">مشاهده سبد خرید</a><a class="btn btn-accent btn-block mt-0 btn-sm" href="/checkout">پرداخت</a></div>';
        }
        return $view;

    }

    public function removesabad(Request $request)
    {

        if (session::get('login')){
            $cart=Cart::get($request->id);
            sabad::where('karbar_id',session::get('login'))->where('prodoct_id',$cart->id)->delete();
        }


        Cart::remove($request->id);

        $view='';

        foreach(Cart::content() as $val){
            $row="'$val->rowId'";
            $view.='<i class="featured-product">';
            $view.='<div class="featured-product-thumb"><img src="/img/prodoct/'.$val->options->img.'" alt="Product Image"/></div>';
            $view.='<div class="featured-product-info">';
            $view.='<h5 class="featured-product-title">'.$val->name.'</h5><span class="featured-product-price">'.number_format($val->price).' تومان</span>';
            $view.='</div>';
            $view.='<span class="remove-product">';
            $view.='<i href="#" onclick="remove_sabad('.$row.')" class="fe-icon-x"></i>';
            $view.='</span></i>';
        }
        if(Cart::count()!=0) {
            $view .= '<hr class="mt-3 mb-3">';
            $view .= ' <span class="text-sm text-muted">قیمت کل: &nbsp;</span><strong>'.Cart::subtotal().'  تومان</strong>';
            $view .= '<div class="d-flex justify-content-between pt-3"><a class="btn btn-primary btn-block btn-sm ml-2" href="/cart">مشاهده سبد خرید</a><a class="btn btn-accent btn-block mt-0 btn-sm" href="/checkout">پرداخت</a></div>';
        }

        return $view;
    }

    public function addsabad(Request $request)
    {
        $id = Input::get('id');
        $qty = Input::get('qtyy');

        if ($qty==null || $qty<1)
            $qty=1;

        $prodoct=prodoct::where('id',$id)->get();
        $dataa=$prodoct[0];

        if ($dataa->takhfif>0)
            $gheymat=$dataa->takhfif;
        else
            $gheymat=$dataa->gheymat;


        $data['id']= $dataa->id;
        $data['price']= $gheymat;
        $data['name']=$dataa->name;
        $data['options']['img']=$dataa->pic;
        $data['qty']=$qty;

        Cart::add($data);



        if (session::get('login')){
            $qty2=null;

            if ($qty2=sabad::where('karbar_id',session::get('login'))->where('prodoct_id',$dataa->id)->first())
            {

                sabad::where('karbar_id',session::get('login'))->where('prodoct_id',$dataa->id)->update(['qty'=>$qty2->qty+$qty]);
            }
            else
            {
                $sabad=new sabad();
                $sabad->karbar_id=session::get('login');
                $sabad->prodoct_id=$dataa->id;
                $sabad->qty=$qty;
                $sabad->save();
            }
        }




        $view='';

        foreach(Cart::content() as $val){
            $row="'$val->rowId'";
            $view.='<i class="featured-product">';
            $view.='<div class="featured-product-thumb"><img src="/img/prodoct/'.$val->options->img.'" alt="Product Image"/></div>';
            $view.='<div class="featured-product-info">';
//            $view.='<h5 class="featured-product-title">'.$val->name.'</h5><span class="featured-product-price">'.number_format($val->price).' تومان</span>';
            $view.='<h5 class="featured-product-title">'.$val->name.'</h5><span class="featured-product-price">'.number_format($val->price).' تومان &#215; '.$val->qty.'</span>';
            $view.='</div>';
            $view.='<span class="remove-product">';
            $view.='<i href="#" onclick="remove_sabad('.$row.')" class="fe-icon-x"></i>';
            $view.='</span></i>';
        }
        if(Cart::count()!=0) {
            $view .= '<hr class="mt-3 mb-3">';
            $view .= ' <span class="text-sm text-muted">قیمت کل: &nbsp;</span><strong>'.Cart::subtotal().'  تومان</strong>';
            $view .= '<div class="d-flex justify-content-between pt-3"><a class="btn btn-primary btn-block btn-sm ml-2" href="/cart">مشاهده سبد خرید</a><a class="btn btn-accent btn-block mt-0 btn-sm" href="/checkout">پرداخت</a></div>';
        }
        return $view;
    }


    public function addfave(Request $request)
    {
        DB::table('karbar_prodoct')->insert([
            'karbar_id'=>session::get('login'),
            'prodoct_id'=>$request->id,
        ]);
    }

    public  function removefave(Request $request)
    {
        DB::table('karbar_prodoct')->where('karbar_id',session::get('login'))->where('prodoct_id',$request->id)->delete();
    }

    public function removecart(Request $request)
    {
        foreach (Cart::content() as $val){
            if ($val->id==$request->id)
                Cart::remove($val->rowId);
        }
    }
}
