<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Services\UploadPhoto;
use Storage;
use Modules\Entity\Model\Routes\Routes;

class Drobsone2Controller extends Controller
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
	public function slider(Request $request){
		
		$routes = Routes::where('id',$request->id)->first();
		$photo = unserialize($routes->photo);
		if(isset($request->path)){
		 $key = array_search($request->path,$photo);
		 unlink($request->path);
		 unset($photo[$key]);
		  $aerialize= serialize($photo);
		 $routes->photo = $aerialize;
		$routes->save();
	     }else{
			 $routes->photo = '';
		     $routes->save();
		 
		
        return $photo;
	}
	}
	
	public function remove(Request $request){
		
		if($request->session()->has('img')) {
			$arr = explode('.',$request->name);
			$name = $arr[0].$arr[1];
			unlink($request->session()->get('img.'.$name));
			$request->session()->forget('img.'.$name);
			$request->session()->save();
			//unlink($request->session()->get('img.'.$name));
			//return $request->session()->get('img');
			//return $request->session()->get('img.'.$name);
		}
	}
	
	 public function send(Request $request)
    {
		  //$res = array("answer" => "error", "error" => "Достигнут лимит загрузки файлов");
		  //return $res;
		  
		$file = $request->file('file');
		
		$name_original= pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$name_original2 = $name_original.$file->getClientOriginalExtension();

		$file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
		$url = '/store/test/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;
		session();
		
        $file_path = $file->storeAs('/store/test/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
		
		
		
		if($request->session()->has('img')) {
        $ar= $request->session()->get('img');
		if(isset($ar[$name_original2])){
			unlink($file_path);
			$res = array("answer" => "error2");
		    return $res;
		}
		}
		$request->session()->put('img.'.$name_original2, $file_path);

		
		return $request->session()->get('img');

    }
	
	
	
}
