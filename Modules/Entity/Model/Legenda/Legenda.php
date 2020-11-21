<?php
namespace Modules\Entity\Model\Legenda;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Legenda extends ModelParent {
    protected $table = 'legenda';
	protected $fillable = [ 'name',
	'description','photo',
	'edited_user_id','subtitle','editor','seo_title','seo_description','publish','photo_catalog','social','gallery','hint'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
        function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

	
	function getTransTableNameAttribute(){
        return $this->getTable();
    }
	
	  function getElIdAttribute(){
        return $this->id;
    }
 

  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Figure\TransFigure', 'el_id');
    }

    


  
}
