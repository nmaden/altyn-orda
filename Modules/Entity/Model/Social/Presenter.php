<?php 
namespace Modules\Entity\Model\Social;
use Cache;

trait Presenter {
	function getHintAttribute($v){
		return $this->getTransField('hint', $v);
    }

	

}

