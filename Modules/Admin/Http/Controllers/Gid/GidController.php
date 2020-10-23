<?php
namespace Modules\Admin\Http\Controllers\Gid;

use Illuminate\Http\Request;


use Illuminate\Routing\Controller;
use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\gid\CalendarUpdateAction as ModelCreateAction;
use Modules\Entity\Actions\gid\CalendarUpdateAction as ModelUpdateAction;
use Modules\Entity\Actions\MainSaveAction as ModelSaveLangAction;
use Modules\Entity\Actions\Calendar\CalendarDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Gid\Gid as Model;

class GidController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.gid';
    protected $route_path = 'admin_gid';
    protected $title_path = 'title.gid';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	
	
   protected function validator(array $data)
    {
	 $messages = [
      'photo.dimensions' => 'Максимальный размер изображения 1000px минимальный размер 30px ',
	  'opyt.string'=>'Опыт должен быть строкой',
	  'oplata.in'=>'неправильное значение',
	  
     ];
	 
	  
		
		//nullable
        return \Validator::make($data, [
		 'name' => 'sometimes|nullable|string',
         'vosrast' => 'sometimes|nullable|numeric',
		 'photo' => 'nullable|sometimes|file|mimes:jpeg,png,svg',
		 'family' => 'sometimes|nullable|string',
         'opyt' => 'sometimes|nullable|string',
		 'gid_title'=>'sometimes|nullable|string',
		 'price'=>'sometimes|nullable|numeric',
		 'imya'=>'sometimes|required|nullable|string',
		 'oplata'=>'sometimes|string|nullable|in:день,час',
         'lang_id.1'=>'array|sometimes|nullable',
         'lang_id.2'=>'array|sometimes|nullable',
         'lang_id.3'=>'array|sometimes|nullable',
         'lang_id.4'=>'array|sometimes|nullable',
         'lang_id.5'=>'array|sometimes|nullable',
         'lang_id.6'=>'array|sometimes|nullable',
         'lang_id.7'=>'array|sometimes|nullable',
		  

	     
        ],$messages);
    }
	
}
