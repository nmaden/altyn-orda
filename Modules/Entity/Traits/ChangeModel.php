<?php
namespace Modules\Entity\Traits;

use Modules\Entity\Services\ChangeModelService;
use Route;
use Cache;
use Modules\Entity\Model\Social\Social;
use Auth;
use RoleService;

trait ChangeModel {
    protected static function boot(){
		
    Social::updating(function (Social $social) {


		if(Cache::has('social')){
		$cache = Cache::get('social');
		$cache[$social->id] = $social->toArray();
        Cache::forever('social',$cache);
       }else{
        Cache::forever('social',[$social->id=>$social->toArray()]);
        }


	});
    Social::created(function (Social $social) {
		
		if(Cache::has('social')){
		$cache = Cache::get('social');
		$cache[$social->id] = $social->toArray();
        Cache::forever('social',$cache);
       }else{
        Cache::forever('social',[$social->id=>$social->toArray()]);
        }
			//dd(Cache::get('social'));

	});
    Social::deleted(function (Social $social) {
		
		if(Cache::has('social')){
		$cache = Cache::get('social');
		unset($cache[$social->id]);
        Cache::forever('social',$cache);
       }
		

	});


        static::updating(function ($el) {
	
           //ChangeModelService::createUpdateNote($el);
            return true;
        });

        static::created(function ($el) {
		
            //ChangeModelService::createCreateNote($el);
            return true;
        });

        static::deleted(function ($el) {
           
            if($el->relTrans()){$el->relTrans()->delete();}
			
			if(RoleService::getRole(Auth::user()->type_id) !='ADMIN'){
			
				$el->relUsers()->delete();
			}

			
			return true;
		
           //ChangeModelService::createDeleteNote($el);
        });
        
        return parent::boot();
    }
}

?>
