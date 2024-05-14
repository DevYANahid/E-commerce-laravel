<?php

namespace App\Http\Controllers;

use App\TextSlider;
use Illuminate\Http\Request;

class TextSliderController extends Controller
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
    public function create()
    {
        //
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
            'title' => 'required'
        ]);



        $titles = $request->title;
        foreach ($titles as $title){
            $metaTitleCount = TextSlider::count();
            $dataInfo = [
                'title' => $title
            ];
            if($metaTitleCount < 10) {
                TextSlider::insert($dataInfo);
            }else{
                return back()->withErrors('Sorry Slider Lemit Is Exceeded');
            }
        }
        return back()->withMessage('Meta Title Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TextSlider  $textSlider
     * @return \Illuminate\Http\Response
     */
    public function show(TextSlider $textSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TextSlider  $textSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(TextSlider $textSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TextSlider  $textSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TextSlider $textSlider)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        $textSlider->title = $request->title;
        $textSlider->save();

        return back()->withMessage('Meta Title Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TextSlider  $textSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(TextSlider $textSlider)
    {
//        dd($textSlider);
    }
}
