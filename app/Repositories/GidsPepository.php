<?php

namespace App\Repositories;
use Modules\Entity\Model\Gid\Gid;

class GidsPepository extends Repository {
	
	
	public function __construct(Gid $gid) {
		$this->model = $gid;
	}
	
}

?>