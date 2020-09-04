<?php

namespace App\Repositories;

use App\Slider;


class Home2Repository extends Repository {
	
	
	public function __construct(Slider $slider) {
		$this->model = $home;
	}
	
}

?>