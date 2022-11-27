<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'products' => Product::all()
        ];

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::arrayForSelect(),
            'mode' => 'create',
            'headline' => 'Add New Product'
        ];

        return view('products.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $formData = $request->all();
        if (Product::create($formData)) {
            Session::flash('message', 'Product Created Successfully');
        }

        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = [
            'product' => Product::find($id)
        ];

        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'product' => Product::findOrFail($id),
            'categories' => Category::arrayForSelect(),
            'mode' => 'edit',
            'headline' => 'Update Product Information'
        ];

        return view('products.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $formRequest = $request->only([
            'category_id',
            'title',
            'description',
            'cost_price',
            'has_stock'
        ]);

        if (Product::with('category')->where('id', $id)->update($formRequest)) {
            Session::flash('message', 'Product Updated Successfully');
        };

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::destroy($id)) {
            Session::flash('message', 'Product Deleted Successfully');
        }

        return redirect()->to('products');
    }
}