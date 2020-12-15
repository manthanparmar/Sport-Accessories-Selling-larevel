<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use DB;


class CategoryController extends Controller
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
    public function create(Request $request)
    {
        //
        $inputes = $request->input();
        try
        {
            $data = new Category();
            $data->categryName = $inputes['categoryName'];
            $data->description = $inputes['categoryDescription'];
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('/cpanel/category');

    }

    public function createSubCategory(Request $request)
    {
        //
        $inputes = $request->input();
        try
        {
            $data = new SubCategory();
            $data->subCategryName = $inputes['subCategoryName'];
            $data->description = $inputes['subCategoryDescription'];
            $data->categoryId = $inputes['categoryId'];
            // $inputes['categoryId'];
            $data->save();
        }
        catch(Exception $e)
        {

        }

        return redirect('cpanel/subcategory');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $inputes = $request->input();

        $category = Category::find($inputes['id']);
        $category->categryName = $inputes['categoryName'];
        $category->description = $inputes['categoryDescription'];

        $category->save();
        return redirect("/cpanel/category");
    }
    public function updateSubCategory(Request $request)
    {
        //
        $inputes = $request->input();

        $subCategory = SubCategory::find($inputes['id']);
        $subCategory->categoryId = $inputes['categoryId'];
        $subCategory->subCategryName = $inputes['subCategoryName'];
        $subCategory->description = $inputes['subCategoryDescription'];

        $subCategory->save();
        return redirect("/cpanel/subcategory");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
         $category = Category::find($id);
         $category->delete();

         return redirect("/cpanel/category");
    }
    public function destroySubCategory($id,Request $request)
    {
        //
         $subCategory = SubCategory::find($id);
         $subCategory->delete();

         return redirect("/cpanel/subcategory");
    }
}
