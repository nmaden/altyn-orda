<?php
namespace Modules\Entity\Model\Social;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Socialitem extends ModelParent {
    protected $table = 'socialitem';
	protected $fillable = ['calendar_id','edited_user_id','social_id'];
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
        return false;
    }

  

    


  
}
