<?php

namespace Modules\Admin\Http\Controllers\Edit;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use App\Services\UploadPhoto;
use Storage;
use Illuminate\Routing\Controller;
use Modules\Entity\Model\Tabs\Tabs;
use Modules\Entity\Model\Figure\Figure;
use Modules\Entity\Model\About\About;

class CkeditorController extends Controller
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
  
 
  function func($file){
  $this->file_name = time().rand(0,9).'.'.$file->getClientOriginalExtension();
  $this->url = '/store/'.$this->papka_save.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$this->file_name;
  
 
}

 public function page($action,$str){
	  
	$this->uri = url()->previous();
	$id = false;
	//$find = strpos($uri,$action);
	preg_match('/'.$action.'\/[\d]+/i',$this->uri,$arr);
	$this->find_str = strpos($this->uri,$str);
	if(!empty($arr)){
		$this->arr = $arr;
		$explod= explode('/',$arr[0]);
		 if(isset($explod[1])){$this->id = $explod[1];}
	}else{
	   $this->arr = false;
     }
 }
 public function befo_save(){
	  
		if(isset($this->arr[0])){
			if(isset($this->id)){
				if(is_numeric($this->id)){
				
					 $this->img = $this->save_baze();
					$this->files->storeAs('/store/'.$this->papka_save.'/'.date('Y').'/'.date('m').'/'.date('d'), $this->file_name);
					 
				}else{return 'no_numeric';}
		       }else{return 'no_page';}
	          }
	    echo json_encode(array('uploaded'=>1,
	   'fileName'=>$this->file_name ,"url" => $this->url));
	   
	  
  }
  
 public function save_baze(){
	
	    $img = [];
	 	if(@unserialize($this->table->{$this->photo})){
			$img = unserialize($this->table->{$this->photo});
		}
		
		array_push($img,$this->url);
		//$tabs = Figure::where('id',$this->id)->first();
		$this->table->{$this->photo} = serialize($img);
		$this->table->save();				
	   $this->img =$img;
 }
 public function collector($file,$action,$str,$table){
	  
	  $func= $this->func($file);//url $file_name 
	  $page= $this->page($action,$str);//uri or http_referer,$arr,id
	  $this->table($table);
	  $this->befo_save();
 }
 
 public function table($table){
	 if($this->id){
	 switch($table){
		 case 'tabs':{
			$this->table = Tabs::where('id',$this->id)->first();
			break;
        }
		case 'figures':{
			$this->table = Figure::where('id',$this->id)->first();
			break;
		}
		case 'abouts':{
			$this->table = About::where('id',$this->id)->first();
			break;
		}
	 }
	 }
 }
public function uploads(Request $request){
	$this->files = $request->file('upload');
	$this->papka_save = 'editor';
	 $action = 'update';
	 $str = 'tabs';
	 $table = 'tabs';
	 $this->photo= 'photo';
	 $this->collector($this->files,$action,$str,$table);
}
public function figures(Request $request){
	
	 $this->files = $request->file('upload');
	 $this->papka_save = 'editor';
	 $action = 'update';
	 $str = 'figure';
	 $table = 'figures';
	 $this->photo= 'editor';
	 $this->collector($this->files,$action,$str,$table);
}
public function about(Request $request){
	
	 $this->files = $request->file('upload');
	 $this->papka_save = 'editor';
	 $action = 'update';
	 $str = 'about';
	 $table = 'abouts';
	 $this->photo= 'editor';
	 $this->collector($this->files,$action,$str,$table);
}
	
}
