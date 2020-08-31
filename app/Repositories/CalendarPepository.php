<?php

namespace App\Repositories;
use Modules\Entity\Model\Calendar\Calendar;

class CalendarPepository extends Repository {
	
	
	public function __construct(Calendar $calendar) {
		
		$this->model = $calendar;
	}
	
}

?>