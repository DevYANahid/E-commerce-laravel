<?php

namespace App\Http\Controllers;

use App\MainBannerScroll;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MainBannerScrollController extends Controller
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
            'company_banner' => 'required|min:1|max:3'
        ]);
//        dd($request);
        $bannerSliderCount = MainBannerScroll::all()->count();
//        dd($bannerSliderCount);
        if ($bannerSliderCount < 3){
            $bannerSlider = new MainBannerScroll();
            if ($request->hasFile('company_banner')) {
                foreach ($request->company_banner as $key => $banner_image) {
                    $image = $banner_image;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . '.banner-image' . ($key + 1) . '.';
                    $filename = time() . $x . $image->getClientOriginalExtension();

                    Image::make($image->getRealPath())->resize(960, 580)->save(public_path('/upload/images/defoult_image/' . $filename));
                    $bannerSlider = [
                        'name' => 'Banner' . ($key + 1),
                        'image' => $filename
                        ];
                    MainBannerScroll::insert($bannerSlider);
                }

            }
            return back()->withMessage('Banner Inserted Successfully');
        }
        return back()->withErrors('Crossed Your Banner Limit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MainBannerScroll  $mainBannerScroll
     * @return \Illuminate\Http\Response
     */
    public function show(MainBannerScroll $mainBannerScroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MainBannerScroll  $mainBannerScroll
     * @return \Illuminate\Http\Response
     */
    public function edit(MainBannerScroll $mainBannerScroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MainBannerScroll  $mainBannerScroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainBannerScroll $mainBannerScroll)
    {
        $this->validate($request,[
            'company_banner' => 'required|max:1',
        ]);

        $bannerImage = $mainBannerScroll->image;
        $path = 'upload/images/defoult_image/'.$bannerImage;
        unlink($path);

        if ($request->hasFile('company_banner')) {
            foreach ($request->company_banner as $banner_image) {
                $image = $banner_image;
                $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                $x = str_shuffle($x);
                $x = substr($x, 0, 6) . '.banner-image' . $mainBannerScroll->id . '.';
                $filename = time() . $x . $image->getClientOriginalExtension();
                Image::make($image->getRealPath())->resize(960, 580)->save(public_path('/upload/images/defoult_image/' . $filename));
                $mainBannerScroll->image = $filename;
            }
            $mainBannerScroll->save();
        }
        return back()->withMessage('Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainBannerScroll  $mainBannerScroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainBannerScroll $mainBannerScroll)
    {
        //
    }
}
