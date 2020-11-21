<?php 
namespace Modules\Entity\Model\Figure;
use Cache;

trait Presenter {
	
	function getNamefigureAttribute($v){
		return $this->getTransField('namefigure', $v);
    }
	
	function getDescriptionfigureAttribute($v){
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
	
	function getSeo(){
		dd(13);
    }
	
	
}

