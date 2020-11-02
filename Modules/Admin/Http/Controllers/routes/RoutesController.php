<?php

namespace Modules\Admin\Http\Controllers\Routes;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Routes\CalendarUpdateAction as ModelCreateAction;
use Modules\Entity\Actions\Routes\CalendarUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\Tabs\DefaultDeleteAction as ModelDeleteAction;
use Exception;

use Modules\Entity\Model\Routes\Routes as Model;

class RoutesController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.routes';
    protected $route_path = 'admin_routes';
    protected $title_path = 'title.routes';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;

	 protected function validator($data,$model=false)
    {
		if(isset($data['category_id'])){
		if(!in_array($data['category_id'],$model->getCat()) && $data['category_id']){
			throw new Exception('не верное значение категории ');
					
		}
		}
		if(isset($data['groups'][0])){
		foreach($data['groups'] as $k=>$item){
			if($k > 1){
				 throw new Exception('не верное значение группы ');
			}
			if(!in_array($item,[1,2])){
				 throw new Exception('не верное значение группы ');
			}
		}
		}
		
 $messages = [
      'personally_price.numeric'=>'Поле стоимость числовой тип поля',
	  	  'name.required'=>'Поле Title не заполнен'

     ];
		
        return \Validator::make($data, [

		 //'photo' => 'nullable|sometimes|file|mimes:jpeg,png,svg|dimensions:min_width=30,max_width=1000',
		 'photo' => 'nullable|sometimes|file|mimes:jpeg,png,svg',
         'name' => 'sometimes|required|string|max:255',
	     'subtitle' => 'sometimes|required|string|max:255',
	     'personally_price' => 'sometimes|nullable|numeric',
	     'price' => 'sometimes|nullable|numeric',
		 
        ],$messages);
    }
	
}
