<?php
namespace Modules\Entity\Model\LibCountry;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class LibCountry extends ModelParent {
    protected $table = 'lib_country';
    protected $fillable = [ 'name', 'edited_user_id', 'continent_id','code'];
    protected $filter_class = Filter::class; 
    use Presenter, CheckTrans;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }
      
    function relContinent(){
        return $this->belongsTo('Modules\Entity\Model\LibContinent\LibContinent', 'continent_id');
    }

    function relTrans(){
        return $this->hasOne('Modules\Entity\Model\TransLib\TransLib', 'el_id')->where('table_name', $this->getTable());
    }

    function getTransTableNameAttribute(){
        return $this->getTable();
    }

    function getElIdAttribute(){
        return $this->id;
    }
}
