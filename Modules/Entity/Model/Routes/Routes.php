<?php
namespace Modules\Entity\Model\Routes;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Routes extends ModelParent {
    protected $table = 'routes';
	
	
    protected $fillable = [ 'photo','name','description','user_id','city_id','props_1','props_3','price','coord','coord_name'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
<<<<<<< HEAD
=======
	 function coords(){
        return $this->hasMany('Modules\Entity\Model\Coords\Coords', 'routes_id');
    }
	
>>>>>>> 2a66976... 31.08.2020
	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	
<<<<<<< HEAD
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Calendar\Application\Application', 'gallery_id','id');
    }
=======
>>>>>>> 2a66976... 31.08.2020
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gid\TransGid', 'el_id');
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
