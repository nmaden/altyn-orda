<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelSaveAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;
use Modules\Entity\Model\LibDiscipline\LibDiscipline as Model;

class DisciplineController extends Controller {
    use MainCrudMethod;
    private $view_path = 'admin::page.lib.discipline';
    private $route_path = 'admin_lib_discipline';
    private $title_path = 'title.lib_discipline';

    protected $def_model = Model::class;
    protected $action_create = ModelSaveAction::class;
    protected $action_update = ModelSaveAction::class;
    protected $action_delete = ModelDeleteAction::class;

}
