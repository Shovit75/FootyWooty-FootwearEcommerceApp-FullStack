<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAttribute;

class ProductAttributeController extends Controller
{
    public function index(){
        $prodattr = ProductAttribute::all();
        return view('attributes.index',compact('prodattr'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $prodattr = new ProductAttribute;
        $prodattr -> name = $request['name'];
        $prodattr -> options = json_encode($request['option']);
        $prodattr -> save();
        return redirect('productattribute');
    }

    public function edit($id){
        $prodattr = ProductAttribute::find($id);
        return view('attributes.edit',compact('prodattr'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $prodattr = ProductAttribute::find($id);
        $prodattr -> name = $request['name'];
        $prodattr -> options = json_encode($request['option']);
        $prodattr -> save();
        return redirect('productattribute');
    }

    public function delete($id){
        $prodattr = ProductAttribute::find($id);
        $prodattr->delete();
        return redirect('productattribute');
    }
}
