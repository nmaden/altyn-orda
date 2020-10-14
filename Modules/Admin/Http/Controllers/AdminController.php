<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
use Modules\Entity\Model\Calendar\Calendar;
use Modules\Entity\Model\SysLang\SysLang;
use Modules\Entity\Model\Gid\Gid;
use Auth;
class AdminController extends Controller
{
    public function index() {
        //alert()->message('Message', 'Optional Title');
		
		$informs= Gid::where('user_id','=',Auth::user()->id)->first();
		     $content = view('admin::page.profile')->with(['info'=>$informs])->render();
         
	
        return view('admin::index')->with(['content'=>$content])->render();
    }
	
	
	
	  public function filter(Request $request){
		
		  if($request->q){
			  $q = $request->q;
		  }
		  switch($request->model){
			  case 'galleries':{
				  $model =  new Calendar();
				  $route_path=$request->path;
				   $name = 'name';
				  break;
			  }
			   case 'gids':{
				  $model =  new Gid();
				  $route_path=$request->path;
				  $name = 'imya';
				  break;
			  }
			  
		  }
		  
		  $result = $model::filter($request)->latest()->paginate(24);
		  
		  $syslang = new SysLang();
		 if(count($result) > 0){
        //$result = DB::table('galleries')->where("name","LIKE","%$q%")->get();
		 $view = view('admin::page.components.search.index')->with(['items'=>$result,
		 'model'=>$model,'sys_lang'=>$syslang,'route_path'=>$route_path,
		 'request'=>$request,'name'=>$name])->render();
		 return response($view)->header('Content-type','text/html');
		 return $view;
		 }else{
			 return 'ok';
		 }
    }

}
