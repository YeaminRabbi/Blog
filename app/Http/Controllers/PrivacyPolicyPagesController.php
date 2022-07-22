<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrivacyPolicy;
use Illuminate\Support\Facades\Storage;
class PrivacyPolicyPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $PrivacyPolicy = PrivacyPolicy::all();
        return view ('pages.privacy.list',compact('PrivacyPolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $PrivacyPolicy = PrivacyPolicy::first();
        return view('pages.privacy.create',compact('PrivacyPolicy'));
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
        $PrivacyPolicy = new PrivacyPolicy;
        
        $PrivacyPolicy->details = $request->details;

        $image  = $request->file('image');
        Storage::putFile('public/img/',$image);
        $PrivacyPolicy->image ="storage/img/".$image->hashName();

        $PrivacyPolicy->save();
        
        return redirect()->route('admin.privacy.create')->with('success','New Privacy Policy created Successfully');
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
        $PrivacyPolicy = PrivacyPolicy::find($id);
        return view('pages.privacy.edit',compact('PrivacyPolicy'));
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
        $PrivacyPolicy                = PrivacyPolicy::find($id);
        $PrivacyPolicy->details       = $request->details;

        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $PrivacyPolicy->image ="storage/img/".$image->hashName();
        }
        $PrivacyPolicy->save();
        
        return redirect()->route('admin.privacy.list')->with('success','Privacy Policy details updated Successfully');

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
        $PrivacyPolicy = PrivacyPolicy::find($id);
        $PrivacyPolicy->delete();
        return redirect()->route('admin.privacy.list')->with('success',"Privacy Policy Deleted Successfully");
    }
}
