<?php

namespace Modules\Admin\Http\Controllers\Edit;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Services\UploadPhoto;
use Storage;
use Modules\Entity\Model\Routes\Routes;
use Modules\Entity\Model\Tabs\Tabs;
use Modules\Entity\Model\Figure\Figure;

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
	 
	 
  
	function help_remove($path){
		$path1 = substr($path,1);
		
			//удаление из базы
			if(@unserialize($this->table->{$this->photo})){
				$img = unserialize($this->table->{$this->photo});
				$key = array_search($path,$img);
				unset($img[$key]);
				$this->table->{$this->photo} = serialize($img);
		        $this->table->save();
			}
			//удаление из хранилища
			Storage::delete($path);
			return 'ok';
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
	if(@unserialize($this->table->{$this->photo})){
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
		$view = view('orda.response.drobzone')->with(['photo'=>$photo_res,'id'=>$this->id,'foto'=>$this->photo])->render();
		return response($view)->header('Content-type','text/html');
   }
   public function collector(){
	  
	  $func= $this->func();//url $file_name 
	  $page= $this->page();//uri or http_referer,$arr,id
	  $this->table();
	  $this->befo_save();
 }
 
 //routes
	 public function send(Request $request)
    {
	 $this->files = $request->file('file');
     $this->papka_save = 'drobzone';
	 $this->photo='gallery';
	 $this->action = 'update';
	 $this->str = 'routes';
	 $this->table_switch = 'routes';
	 $this->collector();
  	 return $this->respons();
    }
	
	//удаление
	public function slider(Request $request){
		$this->table_switch ='routes';
		$this->action = 'update';
	    $this->str = 'routes';
		$this->photo = 'gallery';
		
		$this->page();
		$this->table();
		$this->help_remove($request->path);
	}
	
	
}
