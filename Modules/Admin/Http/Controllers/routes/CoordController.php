<?php
namespace Modules\Admin\Http\Controllers\routes;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Coords\DefaultUpdateAction as ModelCreateAction;

use Modules\Entity\Actions\Coords\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Coords\Coords as Model;

class CoordController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.coords';
    protected $route_path = 'admin_coords';
    protected $title_path = 'title.coords';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	
	 protected function validator(array $data,$model=false)
    {
		
		//nullable
		if(isset($model->id)){
			$unique = 'unique:coord,routes_id,'.$model->id;
		}else{
			$unique = 'unique:coord,routes_id';

		}
        return \Validator::make($data, [
		 'auto' => 'sometimes|required|string',
         'routes_id' => 'sometimes|required|'.$unique,
	     //'data[coor]' => 'sometimes|required',
	     //'imya' => 'sometimes|string',
	     //'price' => 'sometimes|nullable|numeric',
        ]);
		
    }
	
}
