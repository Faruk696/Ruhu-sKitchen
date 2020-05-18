<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\slider;
use Carbon\Carbon;
use Illuminate\Support\Str;


use function GuzzleHttp\Promise\all;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::all();
        return view('admin.slider.index',compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required', 
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
            //mime dara image type bole dicchi
        ]);
        $image = $request->file('image');
        //using slag for removing spaces from a text and replaces those spaces with highpen
        $slug = str::slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();//Carbon er maddhome String akare Current Date Pawar system
            $imagename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //uporer line a image er nam deya hoise...slug and cureent date and uniqueid mix kore so that duita image er nam kokhono e same na hoy
            
            return $imagename;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
