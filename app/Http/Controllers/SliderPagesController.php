<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Slider;
class SliderPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $sliders = Slider::all();
        return view ('pages.sliders.list',compact('sliders'));
    }

    public function restoreList()
    {
        //
        $sliders = Slider::onlyTrashed()->get();
        return view ('pages.sliders.restoreList',compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.sliders.create');

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
        $this->validate($request,[
            'sliderTitle' => 'required|string',
            'littleDescription1' => 'required|string',
            'littleDescription2' => 'required|string',
            'littleDescription3' => 'required|string',
            'image' => 'required|image',

        ]);

        $sliders = new Slider;
        
        $sliders->sliderTitle = $request->sliderTitle;
        $sliders->littleDescription1 = $request->littleDescription1;
        $sliders->littleDescription2 = $request->littleDescription2;
        $sliders->littleDescription3 = $request->littleDescription3;


        $image  = $request->file('image');
        Storage::putFile('public/img/',$image);
        $sliders->image ="storage/img/".$image->hashName();

        $sliders->save();
        
        return redirect()->route('admin.sliders.create')->with('success','New Details created Successfully');
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
        $sliders = Slider::find($id);
        return view('pages.sliders.edit',compact('sliders'));
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
        $sliders                = Slider::find($id);
        $sliders->sliderTitle   = $request->sliderTitle;
        $sliders->littleDescription1   = $request->littleDescription1;
        $sliders->littleDescription2   = $request->littleDescription2;
        $sliders->littleDescription3   = $request->littleDescription3;
   
        
        
        if($request->file('image')){
            $image  = $request->file('image');
            Storage::putFile('public/img/',$image);
            $sliders->image ="storage/img/".$image->hashName();
        }
        $sliders->save();
        
        return redirect()->route('admin.sliders.create')->with('success','Sliders details updated Successfully');
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
        $sliders = Slider::find($id);
        $sliders->delete();
        return redirect()->route('admin.sliders.list')->with('success',"Slider Deleted Successfully");
    }


    public function restoreData($id)
    {
        //
        $sliders = Slider::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.sliders.list')->with('success',"Slider Restored Successfully");
    }
}
