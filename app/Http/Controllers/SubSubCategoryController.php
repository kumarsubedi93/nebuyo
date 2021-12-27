<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubSubCategory;
use App\Brand;
use App\Product;
use App\Language;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $subsubcategories = SubSubCategory::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $subsubcategories = $subsubcategories->where('name', 'like', '%'.$sort_search.'%');
        }
        $subsubcategories = $subsubcategories->paginate(15);
        return view('subsubcategories.index', compact('subsubcategories', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('subsubcategories.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subsubcategory = new SubSubCategory;
        $subsubcategory->name = $request->name;
        $subsubcategory->sub_category_id = $request->sub_category_id;
        //$subsubcategory->attributes = json_encode($request->choice_attributes);
        //$subsubcategory->brands = json_encode($request->brands);
        $subsubcategory->meta_title = $request->meta_title;
        $subsubcategory->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }

        $data = openJSONFile('en');
        $data[$subsubcategory->name] = $subsubcategory->name;
        saveJSONFile('en', $data);
        if($request->hasFile('banner')){
            $subsubcategory->banner = $request->file('banner')->store('uploads/categories/banner');
        }
        if($request->hasFile('icon')){
            $subsubcategory->icon = $request->file('icon')->store('uploads/categories/icon');
        }

        $savedCategory = $subsubcategory->save();

        if ($request->get('attribute_field'))
            $subsubcategory->saveFields($request->get('attribute_field'));

        if($savedCategory){
            flash(translate('SubSubCategory has been inserted successfully'))->success();
            return redirect()->route('subsubcategories.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
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
        $subsubcategory = SubSubCategory::findOrFail(decrypt($id));
        $categories = Category::all();
        $brands = Brand::all();
        $data['attributes'] = $subsubcategory->fields;
        return view('subsubcategories.edit', compact('subsubcategory', 'categories', 'brands', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);

        foreach (Language::all() as $key => $language) {
            $data = openJSONFile($language->code);
            unset($data[$subsubcategory->name]);
            $data[$request->name] = "";
            saveJSONFile($language->code, $data);
        }

        $subsubcategory->name = $request->name;
        $subsubcategory->sub_category_id = $request->sub_category_id;
        //$subsubcategory->attributes = json_encode($request->choice_attributes);
        //$subsubcategory->brands = json_encode($request->brands);
        $subsubcategory->meta_title = $request->meta_title;
        $subsubcategory->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        else {
            $subsubcategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        if($request->hasFile('banner')){
            $subsubcategory->banner = $request->file('banner')->store('uploads/categories/banner');
        }
        if($request->hasFile('icon')){
            $subsubcategory->icon = $request->file('icon')->store('uploads/categories/icon');
        }

        if ($request->get('attribute_field')) {
            $subsubcategory->updateFields($request->get('attribute_field'));
        } else {
            $subsubcategory->removeFields();
        }

        if($subsubcategory->save()){
            flash(translate('SubSubCategory has been updated successfully'))->success();
            return redirect()->route('subsubcategories.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        Product::where('subsubcategory_id', $subsubcategory->id)->delete();
        if(SubSubCategory::destroy($id)){
            foreach (Language::all() as $key => $language) {
                $data = openJSONFile($language->code);
                unset($data[$subsubcategory->name]);
                saveJSONFile($language->code, $data);
            }
            flash(translate('SubSubCategory has been deleted successfully'))->success();
            return redirect()->route('subsubcategories.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function get_subsubcategories_by_subcategory(Request $request)
    {
        $subsubcategories = SubSubCategory::where('sub_category_id', $request->subcategory_id)->get();
        return $subsubcategories;
    }

    // public function get_brands_by_subsubcategory(Request $request)
    // {
    //     $brand_ids = json_decode(SubSubCategory::findOrFail($request->subsubcategory_id)->brands);
    //     $brands = array();
    //     foreach ($brand_ids as $key => $brand_id) {
    //         array_push($brands, Brand::findOrFail($brand_id));
    //     }
    //     return $brands;
    // }

    // public function get_attributes_by_subsubcategory(Request $request)
    // {
    //     $attribute_ids = json_decode(SubSubCategory::findOrFail($request->subsubcategory_id)->attributes);
    //     $attributes = array();
    //     foreach ($attribute_ids as $key => $attribute_id) {
    //         if(\App\Attribute::find($attribute_id) != null){
    //             array_push($attributes, \App\Attribute::findOrFail($attribute_id));
    //         }
    //     }
    //     return $attributes;
    // }
}
