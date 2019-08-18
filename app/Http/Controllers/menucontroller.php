<?php

namespace App\Http\Controllers;

use App\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class menucontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }


    public function create($id)
    {
        if ($id==0)
        return view('admin.add_menu',compact('id'));

        elseif ($id==1){
            $men=menu::where('level_menu',0)->get();
            return view('admin.add_menu',compact('id','men'));
        }
        elseif ($id==2){
            $men=menu::where('level_menu',1)->get();
            return view('admin.add_menu',compact('id','men'));
        }
        else
            return view('errors.404');
    }


    public function store(Request $request,$id)
    {
        if ($id==0) {
            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
            ]);

            $menu = new menu;
            $menu->name_menu = $request->name;
            $menu->level_menu = 0;
            $menu->parent_menu = 0;
            $menu->seo_menu = $request->seo;

            $menu->save();
            Session::put('ok', '1');
            return redirect()->back();

        }
        elseif ($id==1){

            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
                'parent' => 'required',
            ]);

            $menu = new menu;
            $menu->name_menu = $request->name;
            $menu->level_menu = 1;
            $menu->parent_menu = $request->parent;
            $menu->seo_menu = $request->seo;

            $menu->save();
            $ok = 1;
            $men=menu::where('level_menu',0)->get();
            return view('admin.add_menu', compact('ok','id','men'));

        }
        elseif ($id==2){

            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
                'parent' => 'required',
            ]);

            $menu = new menu;
            $menu->name_menu = $request->name;
            $menu->level_menu = 2;
            $menu->parent_menu = $request->parent;
            $menu->seo_menu = $request->seo;

            $menu->save();
            $ok = 1;
            $men=menu::where('level_menu',1)->get();
            return view('admin.add_menu', compact('ok','id','men'));
        }
        else
            return view('admin.errors.404');
    }


    public function show($id)
    {
        if ($id==0) {
            $data=menu::where('level_menu', 0)->get();
            return view('admin.list_menu', compact('id','data'));
        }

        elseif ($id==1){
            $parent=menu::where('level_menu', 0)->get();
            $data=menu::where('level_menu',1)->get();
            return view('admin.list_menu',compact('id','data','parent'));
        }
        elseif ($id==2){
            $parent=menu::where('level_menu', 1)->get();
            $data=menu::where('level_menu',2)->get();
            return view('admin.list_menu',compact('id','data','parent'));
        }
        else
            return view('errors.404');
    }


    public function edit(menu $menu)
    {
        $data=$menu;
        if ($menu->level_menu==0)
            return view('admin.edite_menu',compact('data'));
        elseif ($menu->level_menu==1) {
            $men=menu::where('level_menu',0)->get();
            return view('admin.edite_menu', compact('data','men'));
        }
        else {
            $men=menu::where('level_menu',1)->get();
            return view('admin.edite_menu', compact('data','men'));
        }
    }


    public function update(Request $request, menu $menu)
    {
        if ($menu->level_menu==0) {

            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
            ]);

            menu::where('id', $menu->id)
                ->update([
                    'name_menu' => $request->name,
                    'seo_menu' => $request->seo
                ]);
            return redirect('/admin/list-menu/0');
        }
        elseif ($menu->level_menu==1){
            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
                'parent' => 'required',
            ]);

            menu::where('id', $menu->id)
                ->update([
                    'name_menu' => $request->name,
                    'seo_menu' => $request->seo,
                    'parent_menu' => $request->parent
                ]);
            return redirect('/admin/list-menu/1');
        }
        else{
            $this->validate($request, [
                'name' => 'required',
                'seo' => 'required',
                'parent' => 'required',
            ]);

            menu::where('id', $menu->id)
                ->update([
                    'name_menu' => $request->name,
                    'seo_menu' => $request->seo,
                    'parent_menu' => $request->parent
                ]);
            return redirect('/admin/list-menu/2');
        }
    }


    public function destroy(menu $menu)
    {
        if(menu::find($menu)){
            if($get=menu::where('parent_menu',$menu->id)->get()){
                menu::where('parent_menu',$menu->id)->delete();
                foreach ($get as $value)
                    menu::where('parent_menu',$value->id)->delete();
            }
            menu::where('id',$menu->id)->delete();
            if ($menu->level_menu==0)
            return redirect('/admin/list-menu/0');
            elseif($menu->level_menu==1)
                return redirect('/admin/list-menu/1');
            else
                return redirect('/admin/list-menu/2');
        }
    }
}
