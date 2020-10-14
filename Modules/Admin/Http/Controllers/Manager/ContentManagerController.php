<?php

namespace Modules\Admin\Http\Controllers\Manager;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ContentManagerAction as ModelCreateAction;
use Modules\Entity\Actions\ContentManagerAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\ContentManager\ContentManager as Model;

class ContentManagerController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.content_manager';
    protected $route_path = 'admin_content_manager';
    protected $title_path = 'title.content_manager';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
    	protected function validator(array $data,$model=false)
    {
		if(isset($model->id)){
			$prefix = $model->id;
		}else{
			$prefix = '';

		}
        return \Validator::make($data, [
		   	//'name' => 'string|max:255|unique:users|regex:/(([a-zA-Z0-9-\s]+))/u',

		    'name' => 'required|string|max:255|',
            'email' => 'required|string|email|max:255|unique:users,email,'.$prefix,
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);
    }

}
