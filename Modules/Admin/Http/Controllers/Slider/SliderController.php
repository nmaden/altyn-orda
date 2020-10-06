<?php
namespace Modules\Admin\Http\Controllers\Slider;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Defaults\DefaultSaveAction as ModelCreateAction;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Slider\Slider as Model;

class SliderController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.slider';
    protected $route_path = 'admin_slider';
    protected $title_path = 'title.slider';
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
