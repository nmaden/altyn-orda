<?php
namespace Modules\Admin\Http\Controllers\About\Figure;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Defaults\DefaultSaveAction as ModelCreateAction;

use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Menu\Menu as Model;

class MenuController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.manu';
    protected $route_path = 'admin_menu';
    protected $title_path = 'title.menu';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
}
