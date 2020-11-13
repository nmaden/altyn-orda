<?php
namespace Modules\Entity\Model\Coords;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Coords extends ModelParent {
    protected $table = 'coord';
	protected $fillable = [ 'coord','undex_coord','coord_name','routes_id','user_id','auto','distance'];
	
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
 
	
	 function relRoutes(){
       return $this->hasOne('Modules\Entity\Model\Routes\Routes','routes_id');
    }
	
	
	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Calendar\Application\Application', 'gallery_id','id');
    }
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Coords\TransCoords', 'el_id');
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
