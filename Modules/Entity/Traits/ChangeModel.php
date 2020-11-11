<?php
namespace Modules\Entity\Traits;

use Modules\Entity\Services\ChangeModelService;
use Route;
use Cache;
use Modules\Entity\Model\Social\Social;
use Modules\Entity\Model\Social\TransSocial;
use Modules\Entity\Model\Gid\Gid;
//use Modules\Entity\Model\ContentManager\ContentManager;
//use Modules\Entity\Model\Moderator\Moderator;
use Illuminate\Support\Facades\Request;

use Auth;
use RoleService;
use App\Helper\CurrentLang;
trait ChangeModel {
    protected static function boot(){
		
    Social::updating(function (Social $social) {
				$lang = CurrentLang::url();

		if(Cache::has('social')){
		$cache = Cache::get('social');
		$lang = CurrentLang::url();

		$cache[$social->id][$lang] = $social->toArray();
        Cache::forever('social',$cache);
       }else{
           Cache::forever('social',[$social->id=>[$lang=>$social->toArray()]]);

        }


	});
    TransSocial::updated(function (TransSocial $social) {
		
		$lang = CurrentLang::url();
		if(Cache::has('social')){
		$cache = Cache::get('social');
		$cache[$social->el_id][$lang]=$social->toArray();
        Cache::forever('social',$cache);
       }else{
                   Cache::forever('social',[$social->id=>[$lang=>$social->toArray()]]);

        }
    });


	Social::created(function (Social $social) {
		$lang = CurrentLang::url();
		if(Cache::has('social')){
		$cache = Cache::get('social');
		$cache[$social->id][$lang] = $social->toArray();
        Cache::forever('social',$cache);
       }else{
                   Cache::forever('social',[$social->id=>[$lang=>$social->toArray()]]);

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
	Gid::deleted(function (Gid $gid) {$gid->relUsers()->delete();});
	
	//ContentManager::deleted(function (ContentManager $manager) {$ContentManager->relUsers()->delete();});
	//ContentManager::deleted(function (Moderator $moderator) {$moderator->relUsers()->delete();});

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
			

			
			return true;
		
           //ChangeModelService::createDeleteNote($el);
        });
        
        return parent::boot();
    }
}

?>
