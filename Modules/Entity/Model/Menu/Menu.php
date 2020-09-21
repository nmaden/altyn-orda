<?php
namespace Modules\Entity\Model\Menu;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Menu extends ModelParent {
    protected $table = 'figures';
	protected $fillable = [ 'namefigure',
	'descriptionfigure','photo','birth',
	'status','edited_user_id','introtext','subtitle','editor'];
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
