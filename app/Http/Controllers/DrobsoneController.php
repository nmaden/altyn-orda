<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use App\Services\UploadPhoto;
use Storage;
class DrobsoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function index(Request $request)
    {
		//$request->session()->forget('img');
		//dd(session('img'));
        return view('orda.efinder.drobsone.index');
    }
	 public function send(Request $request)
    {
		return 100;
		$file = $request->file('file');
		$file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
		$url = '/store/test/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;
		session();
		
        $file_path = $file->storeAs('/store/test/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
		
		$request->session()->push('img.item', $file_path);

        return $file_name;
   
		return $file;
		echo dd($request->all());
        return view('orda.efinder.drobsone.index');
    }
	
	
	
}
