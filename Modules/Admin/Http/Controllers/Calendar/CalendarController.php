<?php

namespace Modules\Admin\Http\Controllers\Calendar;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Calendar\CalendarUpdateAction as ModelCreateAction;
use Modules\Entity\Actions\Calendar\CalendarUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainSaveAction as ModelSaveLangAction;
use Modules\Entity\Actions\Calendar\CalendarDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Calendar\Calendar as Model;

class CalendarController extends Controller {
    use MainCrudMethod;
    protected $view_path = 'admin::page.calendar';
    protected $route_path = 'admin_gallery';
    protected $title_path = 'title.gallery';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
}
