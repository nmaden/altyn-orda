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
		
		$path = substr($request->path,1);
		//удаление из базы
			$routes = Routes::where('id',$request->id)->first();
			if(@unserialize($routes->photo)){
				
				//store/drobzone/2020/09/16/16002971759.jpg
				$photo = unserialize($routes->photo);
				
				$key = array_search($request->path,$photo);
				unset($photo[$key]);
				$routes->photo = serialize($photo);
		        $routes->save();
			}
			
			
			
			//удаление из хранилища
			Storage::delete($path);
			return 'ok';
			return $photo;
	}
	
	
	 public function send(Request $request)
    {
       //$res = array("answer" => "error", "error" => "Достигнут лимит загрузки файлов");
	   //return $res;
	   //$res = array("answer" => "error2");
	   //return $res;
     $file = $request->file('file');
     $file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
     $papka_save = 'drobzone';
     $url = '/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$file_name;

	 $uri = url()->previous();
	 
	 $find = strpos($uri,'update');
	
	 if(isset($find)){
		 preg_match('/update\/[\d]+/i',$uri,$arr);
		 if(!empty($arr)){
			
		   $explod= explode('/',$arr[0]);
		   if(isset($explod[1])){
			 if(is_numeric($explod[1])){
				$id = $explod[1];
				$photo = [];
				$routes = Routes::where('id',$id)->first();
				 if(isset($routes->photo) && $routes->photo !=''){
					  
						if(@unserialize($routes->photo)){
							
						 $photo = unserialize($routes->photo);
						}
					}
						
				     array_push($photo,$url);
					
					 $routes->photo = serialize($photo);
		             $routes->save();
					 
					 $file_path = $file->storeAs('/store/'.$papka_save.'/'.date('Y').'/'.date('m').'/'.date('d'), $file_name);
					 
					 
		$routes_res = Routes::where('id',$id)->first();
		$photo_res = unserialize($routes_res->photo);
		$view = view('orda.response.drobzone')->with(['photo'=>$photo_res,'id'=>$id])->render();
		return response($view)->header('Content-type','text/html');


	//session
			 
				}
		       }
		      }
	         }

			
			
    }
	
	
	
}
