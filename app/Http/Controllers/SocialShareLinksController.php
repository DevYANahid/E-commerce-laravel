<?php

namespace App\Http\Controllers;

use App\SocialShareLinks;
use Illuminate\Http\Request;

class SocialShareLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function socialShareLinks(Request $request)
    {
//        dd($request);
        $facebook = SocialShareLinks::where('name', 'facebook')->first();
        $facebookCount = SocialShareLinks::where('name', 'facebook')->count();
        if ($request->has('facebook')) {
            if ($facebookCount > 0) {
                $facebookLink = $facebook;
                $facebookLink->url = $request->facebook;
                $facebookLink->save();
            }else{
                $socialLink = new SocialShareLinks();
                $socialLink->name = 'facebook';
                $socialLink->url = $request->facebook;
                $socialLink->save();
            }
        }

        $instagram = SocialShareLinks::where('name', 'instagram')->first();
        $instagramCount = SocialShareLinks::where('name', 'instagram')->count();
        if ($request->has('instagram')) {
            if ($instagramCount > 0) {
                $instagramLink = $instagram;
                $instagramLink->url = $request->instagram;
                $instagramLink->save();
            }else{
                $socialLink = new SocialShareLinks();
                $socialLink->name = 'instagram';
                $socialLink->url = $request->instagram;
                $socialLink->save();
            }
        }

        $pinterest = SocialShareLinks::where('name', 'pinterest')->first();
        $pinterestCount = SocialShareLinks::where('name', 'pinterest')->count();
        if ($request->has('pinterest')) {
            if ($pinterestCount > 0) {
                $pinterestLink = $pinterest;
                $pinterestLink->url = $request->pinterest;
                $pinterestLink->save();
            }else{
                $socialLink = new SocialShareLinks();
                $socialLink->name = 'pinterest';
                $socialLink->url = $request->pinterest;
                $socialLink->save();
            }
        }

        $whatsapp = SocialShareLinks::where('name', 'whatsapp')->first();
        $whatsappCount = SocialShareLinks::where('name', 'whatsapp')->count();
        if ($request->has('whatsapp')) {
            if ($whatsappCount > 0) {
                $whatsappLink = $whatsapp;
                $whatsappLink->url = $request->whatsapp;
                $whatsappLink->save();
            }else{
                $socialLink = new SocialShareLinks();
                $socialLink->name = 'whatsapp';
                $socialLink->url = $request->whatsapp;
                $socialLink->save();
            }
        }

        return back()->withMessage('Social Links are Saved Successfully');
    }
}
