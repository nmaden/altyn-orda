<?php 
namespace Modules\Entity\Model\Legenda;
use Cache;

trait Presenter {
	

	function getHintUnserializeAttribute(){
		if(@unserialize($this->gallery_title)){
			
			return unserialize($this->gallery_title);
		}else{
			return false;
		}
	 
	}
	
	function getPhotoUnserializeAttribute(){
		if(@unserialize($this->gallery)){
			
			return unserialize($this->gallery);
		}else{
			return false;
		}
	 
	}
	
	function getDescriptionAttribute($v){
		return $this->getTransField('description', $v);
    }

		function getNameAttribute($v){
		return $this->getTransField('name', $v);
    }
	
	
		function getGalleryTitleAttribute($v){
		return $this->getTransField('gallery_title', $v);
    }
	

	function getSubtitleAttribute($v){
		return $this->getTransField('subtitle', $v);
    }
   
	function getSeoTitleAttribute($v){
		return $this->getTransField('seo_title', $v);
    }
	
	function getSeoDescriptionAttribute($v){
		return $this->getTransField('seo_description', $v);
    }
	function getPublishIndexAttribute($v){
	 return array_search($this->publish,['черновик'=>1,'активно'=>2]);
    }
	function getSocialAr(){
    $ar[1]= 'vkontakte';
	array_push($ar,'facebook','odnoklassniki','twitter','viber','whatsapp','skype','telegram');
    return $ar;  
	}
	
	function getSocialShareAttribute(){
     $str ='';
     if($this->ar_social_un){
      foreach($this->ar_social_un as $value){
          $str .= $this->getSocialAr()[$value].',';
       }
	   
      return trim($str,','); 
      }else{
        return 'vkontakte,facebook';
      }
     }
	  function getArSocialUnAttribute(){
		if(@unserialize($this->social)){
           return unserialize($this->social);
         }else{
			
           return [1,2];
          }
     }
	 
	
	
}

