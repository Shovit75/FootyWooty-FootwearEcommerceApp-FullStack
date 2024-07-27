<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trustedpartners;
use Storage;

class TrustedpartnersController extends Controller
{
    public function index(){
        $trusted = TrustedPartners::all();
        return view('trustedpartners.index',compact('trusted'));
    }

    public function store(Request $request){
        $trusted = new TrustedPartners;
        $trusted -> name = $request['name'];
        $imagepath = $request['image']->store('trusted','public');
        $trusted -> image = $imagepath;
        $trusted -> save();
        return redirect('/trusted');
    }

    public function edit($id){
        $trusted = TrustedPartners::find($id);
        return view('trustedpartners.edit',compact('trusted'));
    }

    public function update(Request $request, $id){
        $trusted = TrustedPartners::find($id);
        $trusted -> name = $request['name'];
        if($request['image']){
            if ($trusted->image) {
                Storage::disk('public')->delete($trusted->image); // Delete the old image
            }
            $imagepath = $request['image']->store('trusted','public');
            $trusted -> image = $imagepath; 
        }
        $trusted -> save();
        return redirect('/trusted');
    }

    public function delete($id){
        $trusted = TrustedPartners::find($id);
        if ($trusted->image) {
            Storage::disk('public')->delete($trusted->image); // Delete the old image
        }
        $trusted->delete();
        return redirect('/trusted');
    }
}
