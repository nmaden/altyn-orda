<?php
namespace Modules\Entity\Model\Informs;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Informs extends ModelParent {
    protected $table = 'Informs';
	
	
    protected $fillable = [ 'phone','email','user_id','gid_id'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Calendar\Application\Application', 'gallery_id','id');
    }
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Calendar\TransCalendar', 'el_id');
    }
	
  function relUniversity(){
        return $this->belongsTo('Modules\Entity\Model\University\University', 'univer_id','id');
    }
	
	function relRequirement(){
        return $this->belongsTo('Modules\Entity\Model\Calendar\Requirement', 'requirement_id','id');
    }
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }
/*
 function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gallery\TransGallery', 'el_id');
    }
*/
   

  
    


  
}
