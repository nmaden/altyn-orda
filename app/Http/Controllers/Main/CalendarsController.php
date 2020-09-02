<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

use App\Http\Requests;

use Config;

use App\Repositories\GidsPepository;

use Modules\Entity\Model\Calendar\Calendar;

use Modules\Entity\Model\Categories\Categories;
use Modules\Entity\Model\LibCity\LibCity;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CalendarsController extends SiteController
{

	public function __construct(GidsPepository $gid_rep)
	{

		parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));

		$this->gid_rep = $gid_rep;

		$this->template = 'orda' . '.index';
	}


	public function index(Request $request)
	{
		$items = Calendar::filter($request)->latest()->paginate(9);

		//dd($items);

		$sort_calendar = ["Все мероприятия",'Следующая неделя','Следующий месяц','Следующий год'];
		$gids = $this->getTabs();
		
		
		$cities = LibCity::query()->get();

		$categories = DB::table('categories')->get();

		$search_cities = [];
		
		
		// if($request->city_id) {
		// 		for ($i=0; $i < sizeof($cities); $i++) { 
		// 				$obj = (object)array();
		// 				$obj->name=$cities[$i]->name;
					
		// 				if($cities[$i]->id==$request->city_id) {
		// 					$obj->selected=true;
		// 				}
		// 				else {
		// 					$obj->selected=false;
		// 				}
		// 				$obj->id=$cities[$i]->id;



		// 				array_push($search_cities,$obj);
		// 		}
		// }

		// return $search_cities;
	


		
		$sights_page = view('orda' . '.calendars.calendars')->with([
			'protocol' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://",
			'items' => $items, 'categories'=>$categories,'cities'=>$cities, 'sort_calendars'=>$sort_calendar, 'gid' => $gids, 'request' => $request])->render();
		
		$content = $sights_page;
		$this->vars['content'] = $content;
		$this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';

		return $this->renderOutput();
	}
	public function item(Request $request, Calendar $calendar)
	{

		$gids = $this->getTabs();
		$item_page = view('orda' . '.calendars.calendar-item')->with(['calendar' => $calendar, 'gid' => $gids])->render();
		$content = $item_page;
		$this->vars['content'] = $content;
		$this->keywords = '';
		$this->meta_desc = '';
		$this->title = '';

		return $this->renderOutput();
	}

	protected function getTabs()
	{


		//dd($this->gid_rep->get('*',3));

		$gids = $this->gid_rep->get('*', 3);
		return $gids;
	}
}
