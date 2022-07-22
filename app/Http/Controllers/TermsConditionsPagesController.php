<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermsConditions;
use Illuminate\Support\Facades\Storage;
class TermsConditionsPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $TermsConditions = TermsConditions::all();
        return view ('pages.termsConditions.list',compact('TermsConditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $TermsConditions = TermsConditions::first();


        
        return view('pages.termsConditions.create',compact('TermsConditions'));
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
        $TermsConditions = new TermsConditions;
        
        $TermsConditions->details = $request->details;

        $image  = $request->file('image');
        Storage::putFile('public/img/',$image);
        $TermsConditions->image ="storage/img/".$image->hashName();

        $TermsConditions->save();
        
        return redirect()->route('admin.termsConditions.create')->with('success','New Details created Successfully');
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
        $TermsConditions = TermsConditions::find($id);
        return view('pages.termsConditions.edit',compact('TermsConditions'));
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
        $TermsConditions                = TermsConditions::find($id);
        $TermsConditions->details       = $request->details;

        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $TermsConditions->image ="storage/img/".$image->hashName();
        }
        $TermsConditions->save();
        
        return redirect()->route('admin.termsConditions.list')->with('success','TermsConditions details updated Successfully');

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
        $TermsConditions = TermsConditions::find($id);
        $TermsConditions->delete();
        return redirect()->route('admin.about.list')->with('success',"Terms And Conditions Deleted Successfully");
    }
}
