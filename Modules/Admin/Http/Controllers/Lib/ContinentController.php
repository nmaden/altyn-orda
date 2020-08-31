<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\MainSaveAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;
use Modules\Entity\Model\LibContinent\LibContinent as Model;

class ContinentController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.lib.continent';
    protected $route_path = 'admin_lib_continent';
    protected $title_path = 'title.lib_continent';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;


}
