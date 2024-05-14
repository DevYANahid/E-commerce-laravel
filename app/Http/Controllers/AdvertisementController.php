<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setAdvertisement(Request $request)
    {
        if ($request->has('name')){
            $adCount = Advertisement::where('name',$request->name)->count();

            if($adCount > 0){
                $ad = Advertisement::where('name',$request->name)->first();
                if ($request->hasFile('advertise_image')){
                    foreach ($request->advertise_image as $img) {
                        $image = $img;
                        $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                        $x = str_shuffle($x);
                        $x = substr($x, 0, 6) . '.DAC-ad.';
                        $filename = time() . $x . $image->getClientOriginalExtension();
                        if ($request->name != 'add3') {
                            Image::make($image->getRealPath())->resize(300, 400)->save(public_path('/upload/images/advertise_image/' . $filename));
                        }else{
                            Image::make($image->getRealPath())->resize(960, 180)->save(public_path('/upload/images/advertise_image/' . $filename));
                        }
                    }
                    $ad->name = $request->name;
                    $ad->image = $filename;
                    $ad->embed_code = null;
                    $ad->save();
                }elseif($request->has('embed_code')){
                    if ($ad->image != null){
                        $image = $ad->image;
                        $path = 'upload/images/advertise_image/' . $image;
                        unlink($path);
                        $ad->name = $request->name;
                        $ad->image = null;
                        $ad->embed_code = $request->embed_code;
                        $ad->save();
                    }else{
                        $ad->name = $request->name;
                        $ad->embed_code = $request->embed_code;
                        $ad->save();
                    }
                }
            }else{
                $newAd = new Advertisement();
                if ($request->hasFile('advertise_image')){
                    foreach ($request->advertise_image as $img) {
                        $image = $img;
                        $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                        $x = str_shuffle($x);
                        $x = substr($x, 0, 6) . '.DAC-ad.';
                        $filename = time() . $x . $image->getClientOriginalExtension();
                        if ($request->name != 'add3') {
                            Image::make($image->getRealPath())->resize(300, 400)->save(public_path('/upload/images/advertise_image/' . $filename));
                        }else{
                            Image::make($image->getRealPath())->resize(960, 180)->save(public_path('/upload/images/advertise_image/' . $filename));
                        }
                        $newAd->name = $request->name;
                        $newAd->image = $filename;
                        $newAd->save();
                    }
                }elseif($request->has('embed_code')){
                    $newAd->name = $request->name;
                    $newAd->embed_code = $request->embed_code;
                    $newAd->save();
                }
            }
        }

        return back()->withMessage('Advertisement Set Successfully');
    }
}
