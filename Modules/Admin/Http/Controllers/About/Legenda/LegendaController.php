<?php
namespace Modules\Admin\Http\Controllers\About\Legenda;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelCreateAction;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Legenda\Legenda as Model;

class LegendaController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.legenda';
    protected $route_path = 'admin_legenda';
    protected $title_path = 'title.legenda';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	 protected function validator(array $data)
    {
		$messages = [
         'publish.required'=>'Поле публикация не заполнено',
		 'name.required'=>'Поле заголовок не заполнено',

        ];
		
		//nullable
		
        return \Validator::make($data, [
		 'publish' => 'sometimes|required|numeric',
         'name' => 'sometimes|required',
	     //'opyt' => 'sometimes|numeric',
	     //'imya' => 'sometimes|string',
	     //'price' => 'sometimes|nullable|numeric',
        ],$messages);
    }
	
}
