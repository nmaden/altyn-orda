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
	

}

