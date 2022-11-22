<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];

        return view('category.categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'headline' => 'Add New Category',
            'mode' => 'create'
        ];

        return view('category.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $formData = $request->all();

        if (Category::create($formData)) {
            Session::flash('message', $formData['title'] . 'Added Successfully');
        }

        return redirect()->to('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'category' => Category::findOrFail($id),
            'mode' => 'edit',
            'headline' => 'Update Data'
        ];

        return view('category.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $formRequest = $request->only([
            'title'
        ]);

        if (Category::where('id', $id)->update($formRequest)) {
            Session::flash('message', 'Category Updated Successfully');
        }

        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::find($id)->delete()) {
            Session::flash('message', 'Category Deleted Successfully');
        }

        return redirect()->to('categories');
    }
}