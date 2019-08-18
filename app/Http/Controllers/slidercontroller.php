<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class slidercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'seo' => 'required',
            'pic' => 'required',
        ],
            [
                'name.required'=>'نام را وارد کنید',
                'seo.required'=>'آدرس را وارد کنید',
                'pic.required'=>'عکس را انتخاب کنید',
            ]
        );

        $filename = $request->pic->getClientOriginalName();
        $request->pic->move(public_path('img/slider'), $filename);

        $slider=new slider();

        $slider->name=$request->name;
        $slider->seo=$request->seo;
        $slider->pic=$filename;
        $slider->save();
        Session::put('ok', '1');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider)
    {
        $data=slider::all();
        return view('admin.list_slider',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
            unlink('img/slider/'.$slider->pic);
            $slider->delete();
            return redirect()->back();
    }
}
