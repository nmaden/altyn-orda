<?php

namespace Modules\Admin\Http\Controllers\Main;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\ManagerSaveAction as ModelCreateAction;
use Modules\Entity\Actions\ManagerSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Manager\Manager as Model;

class ManagerController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.main.manager';
    protected $route_path = 'admin_manager';
    protected $title_path = 'title.manager';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
    
}
