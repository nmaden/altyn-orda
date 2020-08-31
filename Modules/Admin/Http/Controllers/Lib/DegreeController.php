<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelSaveAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;
use Modules\Entity\Model\LibDegree\LibDegree as Model;

class DegreeController extends Controller {
    use MainCrudMethod;
    
    protected $view_path = 'admin::page.lib.degree';
    protected $route_path = 'admin_lib_degree';
    protected $title_path = 'title.lib_degree';
    protected $def_model = Model::class;
    protected $action_create = ModelSaveAction::class;
    protected $action_update = ModelSaveAction::class;
    protected $action_delete = ModelDeleteAction::class;
}
