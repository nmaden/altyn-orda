<?php

namespace Modules\Admin\Http\Controllers\Edit;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Services\UploadPhoto;
use Storage;
use Modules\Entity\Model\Routes\Routes;

class Drobsone2Controller extends Controller
{
 public $file_name='';
 public $url;
 public $find_str;
 public $uri;
 public $arr;
 public $id;
 public $table;
 public $papka_save;
 public $photo;
 public $files;
 public $img;
 public $action;
 public $str;
public $table_switch;
	
	
       //$res = array("answer" => "error", "error" => "Достигнут лимит загрузки файлов");
	   //return $res;
	   //$res = array("answer" => "error2");
	   //return $res;
	 
	 
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
	
	function func(){
    $this->file_name = time().rand(0,9).'.'.$this->files->getClientOriginalExtension();
    $this->url = '/store/'.$this->papka_save.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$this->file_name;
  }
   public function page(){
	  
	$this->uri = url()->previous();
	$id = false;
    preg_match('/'.$this->action.'\/[\d]+/i',$this->uri,$arr);
	$this->find_str = strpos($this->uri,$this->str);
	if(!empty($arr)){
		$this->arr = $arr;
		$explod= explode('/',$arr[0]);
		 if(isset($explod[1])){$this->id = $explod[1];}
	}else{
	   $this->arr = false;
     }
 }
 
 public function table(){
	 if($this->id){
	 switch($this->table_switch){
		 case 'tabs':{
			$this->table = Tabs::where('id',$this->id)->first();
			break;}
		case 'figures':{
			$this->table = Figure::where('id',$this->id)->first();
			break;}
		case 'routes':{
			$this->table = Routes::where('id',$this->id)->first();
			break;}
	 }}}
 public function save_baze(){
	$img = [];
	if(@unserialize($this->table->photo)){
		$img = unserialize($this->table->{$this->photo});
	}
	array_push($img,$this->url);
	$this->table->{$this->photo} = serialize($img);
	$this->table->save();
	}
  
 public function befo_save(){
  
  if(isset($this->id)){
	  
	$this->save_baze();//base
	
	 $this->files->storeAs('/store/'.$this->papka_save.'/'.date('Y').'/'.date('m').'/'.date('d'), $this->file_name);//store
					 

   }
  
}
   public function respons(){
	   $photo_res = unserialize($this->table->{$this->photo});
		$view = view('orda.response.drobzone')->with(['photo'=>$photo_res,'id'=>$this->id])->render();
		return response($view)->header('Content-type','text/html');
   }
   public function collector(){
	  
	  $func= $this->func();//url $file_name 
	  $page= $this->page();//uri or http_referer,$arr,id
	  $this->table();
	  $this->befo_save();
 }
 
	 public function send(Request $request)
    {
	 $this->files = $request->file('file');
     $this->papka_save = 'drobzone';
	 $this->photo='photo';
	 $this->action = 'update';
	 $this->str = 'routes';
	 $this->table_switch = 'routes';
	 $this->collector();
  	 return $this->respons();
    }
	
	
	
}
