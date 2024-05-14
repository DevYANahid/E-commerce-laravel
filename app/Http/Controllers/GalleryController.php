<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function store_logo(Request $request)
    {
        $this->validate($request,[
           'company_logo' => 'required|max:1',
        ]);
//        $logo = new Gallery();
        $logo = Gallery::find(1);

        $logoImage = $logo->image;
        $path = 'upload/images/defoult_image/'.$logoImage;
        unlink($path);

        $logo->name = 'Logo';
        foreach ($request->company_logo as $logo_image){
            $image = $logo_image;
            $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $x = str_shuffle($x);
            $x = substr($x,0,6).'.logo-image.';
            $filename = time().$x.$image->getClientOriginalExtension();
            Image::make($image->getRealPath())->resize(218,60)->save(public_path('/upload/images/defoult_image/'.$filename));
            $logo->image = $filename;
        }
        $logo->save();

        return back()->withMessage('Logo Updated Successfully');
    }

}
