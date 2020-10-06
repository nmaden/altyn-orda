<?php
namespace Modules\Admin\Http\Controllers\Social;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelCreateAction;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Social\Social as Model;

class SocialController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.social';
    protected $route_path = 'admin_social';
    protected $title_path = 'title.social';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	
	
	
	
	
	
	protected function validator(array $data)
    {
		//nullable
		//size:512|
        return \Validator::make($data, [
		 //'name' => 'sometimes|required|nullable',
         'photo' => 'nullable|sometimes|file|mimes:jpeg,png|dimensions:min_width=30,max_width=40'
        ]);
    }

	
	
	
	
	
	
	
	
	
	
}
