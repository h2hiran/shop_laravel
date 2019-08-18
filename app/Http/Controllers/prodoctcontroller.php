<?php

namespace App\Http\Controllers;

use App\brand;
use App\menu;
use App\prodoct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class prodoctcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $data=menu::where('level_menu',0)->get();
        $data1=menu::where('parent_menu',$data[0]->id)->get();
        $data2=menu::where('parent_menu',$data1[0]->id)->get();
        $brands=brand::all();
        return view('admin.add_prodoct',compact('data','data1','data2','brands'));
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
            'gheymat' => 'required',
            'takhfif' => 'required',
            'pic' => 'required',
            'dis' => 'required',
            'estefadeh' => 'required',
            'vizh' => 'required',
            'brand' => 'required',
        ],
            [
                'name.required'=>'نام را وارد کنید',
            ]
        );


             $prodoct =new prodoct();
         


            if (isset($request->sub))
                $prodoct->dasteh1=$request->sub;
            else
                $prodoct->dasteh1=0;

           if (isset($request->sub1))
                $prodoct->dasteh2=$request->sub1;
           else
                $prodoct->dasteh2=0;

           if (isset($request->sub2))
                $prodoct->dasteh3=$request->sub2;
          else
                $prodoct->dasteh3=0;




        $filename = $request->pic->getClientOriginalName();
        $request->pic->move(public_path('img/prodoct'), $filename);




        $prodoct->name=$request->name;
        $prodoct->seo=$request->seo;
        $prodoct->gheymat=$request->gheymat;
        $prodoct->takhfif=$request->takhfif;
        $prodoct->estefadeh=$request->estefadeh;
        $prodoct->dis=$request->dis;
        $prodoct->brand_id=$request->brand;
        $prodoct->pic=$filename;
        $prodoct->vizh=$request->vizh;
        if (isset($request->ma))
        $prodoct->suggestion=1;
        if (isset($request->good))
        $prodoct->special=1;

        $prodoct->save();
        Session::put('ok', '1');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prodoct  $prodoct
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=prodoct::all();
        return view('admin.list_prodoct',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prodoct  $prodoct
     * @return \Illuminate\Http\Response
     */
    public function edit(prodoct $prodoct)
    {
        $data=$prodoct;
        return view('admin.edite_prodoct',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prodoct  $prodoct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prodoct $prodoct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prodoct  $prodoct
     * @return \Illuminate\Http\Response
     */
    public function destroy(prodoct $prodoct)
    {
        //
    }
}
