<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
use Illuminate\Support\Facades\Storage;
class AboutUsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $about = AboutUs::all();


        return view ('pages.about.list',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $about = AboutUs::first();
        return view('pages.about.create',compact('about'));
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
        $about = new AboutUs;
        
        $about->details = $request->details;

        $image  = $request->file('image');
        Storage::putFile('public/img/',$image);
        $about->image ="storage/img/".$image->hashName();

        $about->save();
        
        return redirect()->route('admin.about.create')->with('success','New Details created Successfully');
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
        $about = AboutUs::find($id);
        return view('pages.about.edit',compact('about'));
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
        $about                = AboutUs::find($id);
        $about->details   = $request->details;

        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $about->image ="storage/img/".$image->hashName();
        }
        $about->save();
        
        return redirect()->route('admin.about.list')->with('success','About Us details updated Successfully');

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
        $about = AboutUs::find($id);
        $about->delete();
        return redirect()->route('admin.about.list')->with('success',"About Us Deleted Successfully");
    }
}
