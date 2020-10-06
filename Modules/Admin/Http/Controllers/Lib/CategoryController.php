<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Cat\LibCat as Model;

class CategoryController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.lib.cat';
    protected $route_path = 'admin_lib_cat';
    protected $title_path = 'title.lib_cat';
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
