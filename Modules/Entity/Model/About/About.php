<?php
namespace Modules\Entity\Model\About;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class About extends ModelParent {
    protected $table = 'abouts';
	protected $fillable = [ 'photo','name','description','date','seo_title','seo_description'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    
	 function relTabs(){
        return $this->hasMany('Modules\Entity\Model\Tabs\Tabs','about_page_id');
    }
	
	function getTransTableNameAttribute(){
        return $this->getTable();
    }
	
	  function getElIdAttribute(){
        return $this->id;
    }
 

  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\About\TransAbout', 'el_id');
    }

    


  
}
