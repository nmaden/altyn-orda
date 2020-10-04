<?php

namespace Modules\Admin\Http\Controllers\Lib;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\MainSaveAction as ModelCreateAction;
use Modules\Entity\Actions\Defaults\DefaultUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Speac\LibSpeac as Model;

class SpeacController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.lib.speac';
    protected $route_path = 'admin_lib_speac';
    protected $title_path = 'title.lib_speac';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
  }
