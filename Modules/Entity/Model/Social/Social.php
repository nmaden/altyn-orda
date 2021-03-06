<?php
namespace Modules\Entity\Model\Social;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Social extends ModelParent {
    protected $table = 'social';
	protected $fillable = ['photo','edited_user_id','name','hint'];
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
        return $this->hasOne('Modules\Entity\Model\Social\TransSocial', 'el_id');
    }


  

    


  
}
