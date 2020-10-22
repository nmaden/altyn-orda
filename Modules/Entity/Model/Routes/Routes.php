<?php
namespace Modules\Entity\Model\Routes;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Routes extends ModelParent {
    protected $table = 'routes';
	
	
    protected $fillable = [ 'photo','gallery','name','description','user_id','city_id',
	'subtitle','category_id','props_3','price','groups','personally_price','seo_title','seo_description','publish'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }

	 function relUsers(){
        return false;
    }
	

	 function coords(){
        return $this->hasMany('Modules\Entity\Model\Coords\Coords', 'routes_id');
    }
	

	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	

	
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Routes\TransRoutes', 'el_id');
    }
	

	
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }


  
    


  
}
