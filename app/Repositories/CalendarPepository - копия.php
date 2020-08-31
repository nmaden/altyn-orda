<?php

namespace App\Repositories;

use App\Slider;
use Modules\Entity\Model\Calendar\Calendar;

class CalendarPepository extends Repository {
	
	
	public function __construct(Calendar $calendar) {
		$this->model = $calendar;
	}
	
}

?>