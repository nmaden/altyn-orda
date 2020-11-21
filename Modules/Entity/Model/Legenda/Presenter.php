<?php 
namespace Modules\Entity\Model\Legenda;
use Cache;

trait Presenter {
	
	function getNameAttribute($v){
		return $this->getTransField('namefigure', $v);
    }
	function getPhotoUnserializeAttribute(){
		if(@unserialize($this->gallery)){
			return unserialize($this->gallery);
		}else{
			return $this->gallery;
		}
	 
	}
	
	function getDescriptionAttribute($v){
		return $this->getTransField('descriptionfigure', $v);
    }
	
	function getBirthAttribute($v){
		return $this->getTransField('birth', $v);
    }
	
	function getStatusAttribute($v){
		return $this->getTransField('status', $v);
    }
	function getSubtitleAttribute($v){
		return $this->getTransField('subtitle', $v);
    }
    function getIntrotextAttribute($v){
		return $this->getTransField('introtext', $v);
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

