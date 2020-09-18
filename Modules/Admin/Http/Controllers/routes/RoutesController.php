<?php

namespace Modules\Admin\Http\Controllers\Routes;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Routes\CalendarUpdateAction as ModelCreateAction;
use Modules\Entity\Actions\Routes\CalendarUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\Tabs\DefaultDeleteAction as ModelDeleteAction;


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
}
