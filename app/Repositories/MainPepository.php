<?php

namespace App\Repositories;



class MainPepository extends Repository {
	public function __construct($model) {
		dd($model);
		$this->model = $model;
	}
	
}

?>