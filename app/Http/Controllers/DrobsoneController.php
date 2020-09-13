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
		
        return view('orda.efinder.drobsone.index');
    }
	
	
	
}
