<?php
namespace Modules\Admin\Http\Controllers\Home;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\home\HomeSaveAction as ModelCreateAction;

use Modules\Entity\Actions\home\HomeUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Home\Home as Model;

class HomeController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.home';
    protected $route_path = 'admin_home';
    protected $title_path = 'title.home';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
}
