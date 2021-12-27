<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $slider = new Slider;
                $slider->link = $request->link;
                $slider->title = $request->title;
                $slider->subtitle = $request->subtitle;
                $slider->button = $request->button;
                $slider->price = $request->price;
                $slider->information = $request->description ?? null;
                $slider->photo = $photo->store('uploads/sliders');
                $slider->save();
            }
            flash(translate('Slider has been inserted successfully'))->success();
        }
        return redirect()->route('home_settings.index');
    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.edit', compact('slider'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updatePublish(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->published = $request->status;
        if($slider->save()){
            return '1';
        }
        else {
            return '0';
        }

    }

    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.show', compact('slider'));
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
        $slider = Slider::find($id);
        $slider->photo = $request->photos;
        if($request->hasFile('photos')){
            $slider->photo = $request->photos->store('uploads/sliders');
        }
        $slider->published = $request->status;
        $slider->information = $request->description ?? null;
        $slider->link = $request->link;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button = $request->button;
        $slider->price = $request->price;
        $slider->save();
        flash(translate('Slider has been updated successfully'))->success();
        return redirect()->route('home_settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if(Slider::destroy($id)){
            flash(translate('Slider has been deleted successfully'))->success();
        }
        else{
            flash(translate('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }
}
