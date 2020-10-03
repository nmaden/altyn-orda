<?php 
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\University\University;
use Modules\Entity\Model\Social\Social;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();
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
	 function getSityNattribute(){
        return ($this->relCity ?  $this->relCity->name : '');
    }
	
    function getNameAttribute($v){
		return $this->getTransField('name', $v);
    }
	
	function getTextAttribute($v){
		return $this->getTransField('text', $v);
    }
	
   


	
	
	

}

