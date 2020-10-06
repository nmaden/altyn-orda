<?php
namespace Modules\Admin\Http\Controllers\About\Tabs;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Defaults\DefaultSaveAction as ModelCreateAction;

use Modules\Entity\Actions\Tabs\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Tabs\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Tabs\Tabs as Model;

class TabsController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.tabs';
    protected $route_path = 'admin_tabs';
    protected $title_path = 'title.tabs';
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
