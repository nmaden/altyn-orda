<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\MainSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\LibLanguage\LibLanguage as Model;

class LanguageController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.lib.language';
    protected $route_path = 'admin_lib_language';
    protected $title_path = 'title.lib_language';
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
