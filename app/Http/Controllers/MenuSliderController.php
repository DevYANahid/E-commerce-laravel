<?php

namespace App\Http\Controllers;

use App\MenuSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MenuSliderController extends Controller
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
//        dd($request);
        $this->validate($request,[
            'company_menu_slider' => 'required|min:1|max:3'
        ]);
//        dd($request);
        $menuSliderCount = MenuSlider::all()->count();
//        dd($menuSliderCount);
        if ($menuSliderCount < 3){
            $menuSlider = new MenuSlider();
            if ($request->hasFile('company_menu_slider')) {
                foreach ($request->company_menu_slider as $key => $menu_slider_image) {
                    $image = $menu_slider_image;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . '.menu-slider-image' . ($key + 1) . '.';
                    $filename = time() . $x . $image->getClientOriginalExtension();

                    Image::make($image->getRealPath())->resize(295, 320)->save(public_path('/upload/images/defoult_image/' . $filename));
                    $menuSlider = [
                        'name' => 'Menu-Slider' . ($key + 1),
                        'image' => $filename
                    ];
                    MenuSlider::insert($menuSlider);
                }

            }
            return back()->withMessage('Menu Slider Inserted Successfully');
        }
        return back()->withErrors('Crossed Your Menu Slider Limit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuSlider  $menuSlider
     * @return \Illuminate\Http\Response
     */
    public function show(MenuSlider $menuSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuSlider  $menuSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuSlider $menuSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuSlider  $menuSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuSlider $menuSlider)
    {
        $this->validate($request,[
            'company_menu_slider' => 'required|max:1',
        ]);

        $menuSliderImage = $menuSlider->image;
        $path = 'upload/images/defoult_image/'.$menuSliderImage;
        unlink($path);

        if ($request->hasFile('company_menu_slider')) {
            foreach ($request->company_menu_slider as $menu_slider_image) {
                $image = $menu_slider_image;
                $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $x = str_shuffle($x);
                $x = substr($x, 0, 6) . '.Menu-Slider' . $menuSlider->id . '.';
                $filename = time() . $x . $image->getClientOriginalExtension();
                Image::make($image->getRealPath())->resize(295, 320)->save(public_path('/upload/images/defoult_image/' . $filename));
                $menuSlider->image = $filename;
            }
            $menuSlider->save();
        }
        return back()->withMessage('Menu Slider Image Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuSlider  $menuSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuSlider $menuSlider)
    {
        //
    }
}
