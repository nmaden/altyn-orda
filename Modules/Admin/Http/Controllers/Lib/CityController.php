<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\MainSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\LibCity\LibCity as Model;

class CityController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.lib.city';
    protected $route_path = 'admin_lib_city';
    protected $title_path = 'title.lib_city';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
    

    
    

}
