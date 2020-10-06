<?php

namespace Modules\Admin\Http\Controllers\Sights;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Sights\CalendarSaveAction as ModelCreateAction;
use Modules\Entity\Actions\Sights\CalendarUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainSaveAction as ModelSaveLangAction;
use Modules\Entity\Actions\Sights\CalendarDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Sights\Sights as Model;

class SightsController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.sights';
    protected $route_path = 'admin_sights';
    protected $title_path = 'title.sights';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	
	
	
	
	 protected function validator(array $data)
    {
		//nullable
        return \Validator::make($data, [
		 //'name' => 'sometimes|required|string',
         //'vosrast' => 'sometimes|nullable|numeric',
	     //'opyt' => 'sometimes|numeric',
	     //'imya' => 'sometimes|string',
	     //'price' => 'sometimes|nullable|numeric',
        ]);
    }
	
	
	
	
	
	
	
	
	
	
	
	
}
