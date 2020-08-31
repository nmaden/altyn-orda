<?php 
namespace Modules\Entity\Model\University;

use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibUniverCat\LibUniverCat;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibLangStudy\LibLangStudy;
use Modules\Entity\Model\LibDegree\LibDegree;
use Modules\Entity\Model\University\UniversityData;
use Modules\Entity\Model\University\UniversityFees;
use Modules\Entity\Model\University\UniversityDormitory;
use Modules\Entity\Model\LibRequirement\LibRequirement;
use Illuminate\Http\Request;
use Cache;
trait Presenter {
    private $rel_fee_obj_ar = [];

    function getCityAr(){
		if(Cache::has('city')){
		$cache = Cache::get('city');
        return $cache;
		}else{
		Cache::forever('city',LibCity::pluck('name', 'id')->toArray());
		return LibCity::pluck('name', 'id')->toArray();
		}
    }
function getArCatIdAttribute(){
        return $this->relCats()->pluck('cat_id')->toArray();
    }
    function getCatAr(){
    if(Cache::has('cat')){
	$cache = Cache::get('cat');
	 return $cache;
    }else{
	Cache::forever('cat',LibUniverCat::pluck('name', 'id')->toArray());
	return LibUniverCat::pluck('name', 'id')->toArray();
	}
 }

    function getDisciplineAr(){
	if(Cache::has('discipline')){
	  $cache = Cache::get('discipline');
	 return $cache;
		  }else{
	 Cache::forever('discipline',LibDiscipline::pluck('name', 'id')->toArray()); 
	 return LibDiscipline::pluck('name', 'id')->toArray();
		  }
        
    }
 function getRequirementAr(){
	 
	 if(Cache::has('requirement')){
	  $cache = Cache::get('requirement');
	 return $cache;
		  }else{
	 Cache::forever('requirement',LibRequirement::pluck('name', 'id')->toArray()); 
	 return LibRequirement::pluck('name', 'id')->toArray();
		  }
	 
	}
	
	
    function getLangAr(){
		if(Cache::has('lang')){
		 $cache = Cache::get('lang');
	       return $cache;
		}else{
	    Cache::forever('lang',LibLangStudy::pluck('name', 'id')->toArray());
		return LibLangStudy::pluck('name', 'id')->toArray();
    }}

    function getDegreeAr(){
	  if(Cache::has('degree')){
		 $cache = Cache::get('degree');
	       return $cache;
		}else{
		Cache::forever('degree',LibDegree::pluck('name', 'id')->toArray());
		return LibDegree::pluck('name', 'id')->toArray();
		}
        
    }

    function getRelDormitory(){
        if (!$this->rel_doremitory_obj && !$this->relDormitory)
            $this->rel_doremitory_obj = new UniversityDormitory();
        else if (!$this->rel_doremitory_obj)
            $this->rel_doremitory_obj = $this->relDormitory;

        //$this->rel_doremitory_obj->setLocale($this->lang);

        return $this->rel_doremitory_obj;
    }

    function getRelDataObj(){
        if (!$this->rel_data_obj && !$this->relData){
			
			 $this->rel_data_obj = new UniversityData();
		}
           
        else if (!$this->rel_data_obj){
			$this->rel_data_obj = $this->relData;
		}
           
           //$this->rel_data_obj->setLocale($this->lang);

        return $this->rel_data_obj;
    }

    
    function getRelFeeObj($degree_id){
        if (!$this->rel_fee_obj_ar)
            $this->rel_fee_obj_ar = [];
        
        if (!isset($this->rel_fee_obj_ar[$degree_id]) && $fee = $this->relFees()->where(["degree_id" => $degree_id])->first())
            $this->rel_fee_obj_ar[$degree_id] = $fee;
        else if (!isset($this->rel_fee_obj_ar[$degree_id]))
            $this->rel_fee_obj_ar[$degree_id] =  new UniversityFees();

        return $this->rel_fee_obj_ar[$degree_id];
    }

    

  function getAbout_textAttribute(){
        return $this->relLang()->pluck('lang_id')->toArray();
    }
    function getArLangIdAttribute(){
        return $this->relLang()->pluck('lang_id')->toArray();
    }

    function getArDisciplineIdAttribute(){
        return $this->relDiscipline()->pluck('discipline_id')->toArray();
    }

    function getEditedUserNameAttribute(){
        return ($this->relEditedUser ?  $this->relEditedUser->name : '');
    }

    function getNameAttribute($v){
		$route = \Route::currentRouteName();
		if($route == 'admin_uni_show'){
		//dd($route);
		}
		//return $v;
        return $this->getTransField('name', $v);
    }
    
    function getContinentNameAttribute(){
        return ($this->relContinent ?  $this->relContinent->name : '');
    }
    
    function getCountryNameAttribute(){
        return ($this->relCountry ?  $this->relCountry->name : '');
    }
    
    function getCityNameAttribute(){
        return ($this->relCity ?  $this->relCity->name : '');
    }
    
 

}

