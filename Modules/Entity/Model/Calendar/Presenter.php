<?php 
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\University\University;
use Modules\Entity\Model\Social\Social;
use Carbon\Carbon;

//use Modules\Entity\Model\LibRequirement\LibRequirement;

use Cache;

trait Presenter {
	
	function getCityAr(){
		return LibCity::pluck('name', 'id')->toArray();
    }
	function getDateAr(){
	$sort_calendar = [
		1=>'Cледущая неделя',
        2=>'Cледущий месяц',
        3=>'Cледущий год'
       ];
	   return $sort_calendar;
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
	
	function getSeoTitleAttribute($v){
		return $this->getTransField('seo_title', $v);
    }
	
	function getSeoDescriptionAttribute($v){
		return $this->getTransField('seo_description', $v);
    }
	   function getViewDateAttribute($v){
		 if($this->date){
			 		
          $carbon =  Carbon::createFromFormat('Y-m-d', $this->date);
		  if($carbon->toDateString() == $carbon->year.'-11-30'){
			
            return $carbon->year;
            }
		   }
		   
		       return $this->date;;
		   }
		   
   function getCaAttribute($v){
	   if(!$this->date){return false;}
	   $carbon =  Carbon::createFromFormat('Y-m-d', $this->date); 
      

      if($this->blizkie){switch($this->blizkie){
		   case 2:{$model = $this::where('date', '>=',$carbon->toDateString())->where('date', '<=',$carbon->addMonth(1)->toDateString())->get();break;}
		   case 1:{$model = $this::where('date', '>=',$carbon->toDateString())->where('date', '<=',$carbon->addWeek(1)->toDateString())->get();break;}
		   case 3:{$model = $this::where('date', '>=',$carbon->toDateString())->where('date', '<=',$carbon->addYear(1)->toDateString())->get();break;}
		 }
	   }else{$model = $this::where('date', '>=',$carbon->toDateString())->where('date', '<=',$carbon->addWeek(1)->toDateString())->get();}
	   if($model){
		   return $model;}else{return false;}
     }
	

}

