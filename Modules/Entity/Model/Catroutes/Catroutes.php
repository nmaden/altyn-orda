<?php
namespace Modules\Entity\Model\Catroutes;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Catroutes extends ModelParent {
    protected $table = 'lib_routes_categories';
    protected $fillable = [ 'name', 'edited_user_id'];
    protected $filter_class = Filter::class; 
    use Presenter;
    
    function relEditedUser(){
        return $this->belongsTo('App\User', 'edited_user_id');
    }

    function relCountry(){
        return $this->belongsTo('Modules\Entity\Model\LibCountry\LibCountry', 'country_id');
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
