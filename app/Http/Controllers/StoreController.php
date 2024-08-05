<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $Queryproducts = Product::query();
        $Categories = Category::with('products')->has('products')->get();

        // by name and description
        $name = $request->input('name');
        if(!empty($name)){
            $Queryproducts->where('name', 'like', "%{$name}%",)->orWhere('description', 'like', "%{$name}%");
        }
        // by category
        $categoriesids = $request->input('categories');
        if(!empty($categoriesids)){
            $Queryproducts->whereIn('category_id', $categoriesids);
        }

        $max = $request->input('max');
        $min = $request->input('min','0');
        if(!empty($max)){
            $Queryproducts->where('price', '<=',$max);
        }

        $products = $Queryproducts->get();
        return view('store.index', compact(
            'products',
            'Categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view('products.create', compact(
            'product'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $FormFields = $request->validated();
        if ($request->hasFile('image')) {
            $FormFields['image'] = $request->file('image')->store('product','public');
        }
        Product::create($FormFields);
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request,Product $product)
    {

        $FormFields = $request->validated();

        if ($request->hasFile('image')) {
            $FormFields['image'] = $request->file('image')->store('product', 'public');
        }
        $product->fill($FormFields)->save();

        return redirect()->route('products.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
