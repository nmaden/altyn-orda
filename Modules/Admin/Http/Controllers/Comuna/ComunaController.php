<?php

namespace Modules\Admin\Http\Controllers\Comuna;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainSystemMethods;
use Modules\Admin\Traits\MainListMethod;
use Modules\Admin\Traits\MainShowMethod;
use Modules\Admin\Traits\MainDeleteMethod;

use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;
use Modules\Entity\Actions\ComunaAcceptAction;

use Modules\Entity\Model\Comuna\Comuna as Model;

class ComunaController extends Controller {
    use MainSystemMethods, MainListMethod, MainShowMethod, MainDeleteMethod;

    protected $view_path = 'admin::page.comuna.comuna';
    protected $route_path = 'admin_comuna';
    protected $title_path = 'title.comuna';
    protected $def_model = Model::class;
    protected $action_delete = ModelDeleteAction::class;
    
    function accept(Request $request, Model $item){
        $action = new ComunaAcceptAction($item, $request);
        $result = $action->run();
        
		switch($result->status_id){
			case Model::CREATED:{
             break;
			}
			case Model::ACCCEPTED: {
				$status = trans('main.accept_item');
			break;
			}
			case Model::CANCELED: {
				$status = trans('main.accept_item_canceled');

             break;
			}
		}
		
		
		
        return redirect()->route($this->route_path)->with('success', $status);
    }


}
