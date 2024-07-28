<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Storage;

class BannerController extends Controller
{
    public function index(){
        $banner = Banner::all();
        return view('banners.index',compact('banner'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'headline' => 'required',
            'headline2' => 'required',
            'headline3' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $banner = new Banner;
        $banner -> name = $request['name'];
        $banner -> headline = $request['headline'];
        $banner -> headline2 = $request['headline2'];
        $banner -> headline3 = $request['headline3'];
        $banner -> link = $request['link'];
        $imagepath = $request['image']->store('banner','public');
        $banner -> image = $imagepath;
        $banner -> save();
        return redirect('/banner');
    }

    public function edit($id){
        $banner = Banner::find($id);
        return view('banners.edit',compact('banner'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'headline' => 'required',
            'headline2' => 'required',
            'headline3' => 'required',
            'link' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $banner = Banner::find($id);
        $banner -> name = $request['name'];
        $banner -> headline = $request['headline'];
        $banner -> headline2 = $request['headline2'];
        $banner -> headline3 = $request['headline3'];
        $banner -> link = $request['link'];
        if($request['image']){
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image); // Delete the old image
            }
            $imagepath = $request['image']->store('banner','public');
            $banner -> image = $imagepath; 
        }
        $banner -> save();
        return redirect('/banner');
    }

    public function delete($id){
        $banner = Banner::find($id);
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image); // Delete the old image
        }
        $banner->delete();
        return redirect('/banner');
    }
}
