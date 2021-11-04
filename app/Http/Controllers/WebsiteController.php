<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Website;
use App\Http\Requests\WebsiteRequest;
class WebsiteController extends Controller
{
    public function index()
    {
        $website = Website::find(1);
    	return view('website.index',compact('website'));
    }
    public function update(WebsiteRequest $request, $id)
    {   

    	Website::find($id)->update($request->all());		

    	if($request->file('puskesmas_image')){
    		$file = $request->file('puskesmas_image');
    		$ext  = $file->guessClientExtension();			
            $path = $file->move("img/config", "logo.{$ext}");
    		Website::where('id', 1)->update(['puskesmas_image' => "img/config/logo.{$ext}"]);
    	}

    	if($request->file('favicon')){
    		$file = $request->file('favicon');
    		$ext  = $file->guessClientExtension();			
            $path = $file->move("img/config", "favicon.{$ext}");
    		Website::where('id', 1)->update(['favicon' => "img/config/favicon.{$ext}"]);
    	}

        $this->flashMessage('check', 'Application settings updated successfully!', 'success');

    	return redirect()->route('website');
    }
}
