<?php
namespace Modules\Entity\Model\Gallery\Application;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Application extends ModelParent{
    protected $table = 'applications';
    protected $fillable = [ 'date','description','gallery_id'];
    protected $filter_class = Filter::class; 
    use Presenter;
	
    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gallery\TransGallery', 'el_id');
    }

   }
