<?php

namespace Modules\Admin\Http\Controllers\Manager;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ContentManagerAction as ModelCreateAction;
use Modules\Entity\Actions\ContentManagerAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;
use Modules\Entity\Actions\Manager\RoleAction;

use Modules\Entity\Model\ContentManager\ContentManager as Model;
use PageService;
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
		
	    $required ='nullable';
        if(isset($model->id)){$prefix = $model->id;}
		else{$prefix = '';$required='required';}
		
		
	$messages = [
      'name.required' => 'Поле ФИО обязательно',
	  'password.required'=> 'Поле пароль обязателен',
	  'email.required'=>'Поле email обязательно'
     ];
	 
        return \Validator::make($data, [
		   	//'name' => 'string|max:255|unique:users|regex:/(([a-zA-Z0-9-\s]+))/u',
            'login'=>'required|max:255|unique:users,email,'.$prefix,
		    'name' => 'required|string|max:255|',
            'email' => 'required|string|email|max:255|unique:users,email,'.$prefix,
			'password' => 'min:6|regex:/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/u|'.$required,
          ],$messages);
    }

}
