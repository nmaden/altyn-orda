<?php
namespace Modules\Entity\Actions\Defaults;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;
use Storage;
use Cache;
class DefaultUpdateAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
        $this->saveMain();
	
    }

    private function saveMain(){
        $ar = $this->request->all();
		
        $ar['user_id'] = $this->request->user()->id;
        	$ar['edited_user_id'] = $this->request->user()->id;

	 	 	if ($this->request->has('photo')){
			
			if(is_file(public_path($this->model->photo))){
	          Storage::delete($this->model->photo);
            }
            $ar['photo'] = UploadPhoto::upload($this->request->photo,$this->model->photo);
	   }
        else {
			
			if(isset($ar['foto'])){
              $ar['photo']= $ar['foto'];
			}else{
				 unset($ar['photo']);
			}
		}
  
        

		  
		  
		if($this->request->description){
		preg_match_all('/\/store\/editor\/[\d]+\/[\d]+\/[\d+]+\/[\d\w]+.[\w]+/i',$this->request->description,$array2);
		if(is_array($this->model->editor_unserialize)){
			$baza = $this->model->editor_unserialize;
			$diff = array_diff($baza,$array2[0]);
			$diff2 = array_diff($array2[0],$baza);

			$intersect = array_intersect($baza,$array2[0]);
            if(is_array($diff) && !empty($diff)){
			 foreach($diff as $item){
			   Storage::delete($item);
              }
			 }
			 $image = $diff2;
			 if($intersect){
			 $image = array_merge($intersect,$diff2);
			 }
			 		
             
			if(!empty($intersect) || !empty($image)){
				$ar['editor'] = serialize($image);
			}
		  }else{
			  if(!empty($array2)){
			  $ar['editor'] = serialize($array2[0]);
			  }
		  }
	    }

if($this->request->hint && is_array($this->request->hint)){
	     
	      $gallery_keys = array_keys($this->request->gallery);
		  $gallery_combine= array_combine($gallery_keys,$ar['hint']);
		  $ar['gallery_title']= serialize($gallery_combine);
		  //dd(unserialize($ar['gallery_title']));
		 }

unset($ar['gallery']);
      

	   if($this->request->general){if($this->request->seo_description || $this->request->seo_title){
		   //dd($this->request->all());
		   $title= strip_tags($this->request->seo_title);
		   $desc= strip_tags($this->request->seo_description);

		   if($this->request->lang){Cache::forever('seo-'.$this->request->general.'-'.$this->request->lang,[$title,$desc]);
          }else{Cache::forever('seo-'.$this->request->general.'-ru',[$title,$desc]);//сохранение безвременно
		   }}}
	   
	   	if($this->request->social && is_array($this->request->social)){
         $ar['social'] = serialize($this->request->social);
       }
     
	 				  	//dd($ar);

        $this->model->fill($ar);
        $this->model->save();
    }

   private function saveApplication(){
        if (!method_exists($this->model, 'relApplication'))
            return true;
		
		
		$this->model->relApplication->update(['date' => $this->request->date,'description' => $this->request->description]);
		
        }

    private function saveRequirement(){
        if (!method_exists($this->model, 'relRequirement'))
            return true;
		
		$this->model->relRequirement()->create(['text' => $this->request->text]);
        
      }

     private function saveInforms(){
        $this->model->relInforms->updateOrCreate(['gid_id' => $this->model->id], $this->request->data);
    }



}