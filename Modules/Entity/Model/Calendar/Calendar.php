<?php
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Calendar extends ModelParent {
    protected $table = 'galleries';
	
	
    protected $fillable = [ 'photo','name','text','user_id','city_id','category_id','date','social',
	'seo_description','seo_title','general','blizkie','publish','edited_user_id'
	];
	
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
	function Social(){
        return $this->belongsToMany(
		'Modules\Entity\Model\Social\Social',
		'Modules\Entity\Model\Social\Socialitem', 'calendar_id','social_id');
    }

  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Calendar\TransCalendar', 'el_id');
    }
	
	function relMeta(){
        return $this->hasOne('Modules\Entity\Model\Meta\MetaCalendar', 'items_id');
    }
	
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }
 function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    } 

  
    


  
}
