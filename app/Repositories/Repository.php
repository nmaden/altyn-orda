<?php

namespace App\Repositories;
use Config;

abstract class Repository {
	
	protected $model = FALSE;
	
	
	public function get($select = '*',$take = FALSE,$pagination = FALSE, $where = FALSE,$widh=FALSE,$distinct = FALSE) {
		if($widh){
			
		   $builder = $this->model::with($widh)->select($select);
		

		
		}else{
					$builder = $this->model->select($select);

		}
		
		if($take) {
			$builder->take($take);
		}
		
		if($where) {
		
			$builder->where($where);
		}
		if($distinct){
			
			$builder->orderBy($distinct,'desc');

			
		}
		
		if($pagination) {
			
	

			return $builder->paginate($pagination,'default2');
		}
	
		return $builder->get();
	}
	

	public function one2($alias,$attr = array()) {
		$result = $this->model->where('alias',$alias)->first();
		
		return $result;
	}
	public function one($alias,$widh = FALSE) {
		//print_r($widh);exit();
		$result = $this->model::with($widh)->where('programms_id',$alias)->first();
		
		return $result;
	}
	


	
}

?>