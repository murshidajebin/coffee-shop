<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // SHOW ALL PRODUCTS
    public function index()
{
    $products = Product::with('category')->latest()->get();

    return view('admin.products.index',compact('products'));
}


    // SHOW ADD FORM
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // SAVE PRODUCT
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePath = $request->file('image')->store('products','public');

    Product::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $imagePath
    ]);

    return redirect()->route('products.index')
           ->with('success','Product Added');
}

    // EDIT FORM
   public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('admin.products.edit',
        compact('product','categories'));
}

    // UPDATE PRODUCT
  public function update(Request $request,$id)
{
    $product = Product::findOrFail($id);

    if($request->hasFile('image'))
    {
        $imagePath = $request->file('image')
            ->store('products','public');

        $product->image = $imagePath;
    }

    $product->update([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description
    ]);

    return redirect()->route('products.index')
        ->with('success','Product Updated');
}


    // DELETE PRODUCT
   public function destroy($id)
{
    Product::destroy($id);

    return back()->with('success','Product Deleted');
}

}
