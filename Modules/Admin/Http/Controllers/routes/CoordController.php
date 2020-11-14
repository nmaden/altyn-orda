<?php
namespace Modules\Admin\Http\Controllers\routes;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Modules\Admin\Traits\MainCrudMethod;

use Modules\Entity\Actions\Coords\DefaultUpdateAction as ModelCreateAction;

use Modules\Entity\Actions\Coords\DefaultUpdateAction as ModelUpdateAction;

use Modules\Entity\Actions\Defaults\DefaultDeleteAction as ModelDeleteAction;

use Modules\Entity\Model\Coords\Coords as Model;

class CoordController extends Controller {
    use MainCrudMethod;
	protected $informers = true;
    protected $view_path = 'admin::page.coords';
    protected $route_path = 'admin_coords';
    protected $title_path = 'title.coords';
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_update = ModelUpdateAction::class;
    protected $action_delete = ModelDeleteAction::class;
	
	 protected function validator(array $data,$model=false)
    {
	if($data['routes_id'] == 0){
		throw new \Exception('не выбран маршрут');
	}
	
	$messages = [
      //'routes_id.not_in' => 'Максимальный размер изображения 1000px' 
	   'routes_id.unique' => 'Такой маршрут уже есть, можно выбрать другой' 

     ];
	 
if($data['data']['coor']){
 if(is_array(json_decode($data['data']['coor']))){
	  $decod = json_decode($data['data']['coor']);
	  foreach($decod as $k=>$item){
		  if(!isset($item[0]) && !isset($item[1])){throw new \Exception('не правильный формат координат');}
		 if(!is_numeric($item[0]) && !is_numeric($item[1])){
			 throw new \Exception('кординаты должны быть числом');
         }
		 preg_match("/[<>%$#@!&()]+/i",$data['coord_name'][$k],$arr);
		 if(isset($arr[0])){throw new \Exception('не допустимые символы');
          }
		if(isset($data['distance'][$k])){
		if(!is_numeric($data['distance'][$k])){throw new \Exception('дистанция должна быть числом');
       }}}
      }else{throw new \Exception('не правильный формат координат');}

}
	
	 
		if(isset($model->id)){
			//$unique = 'unique:coord,routes_id';

			$unique = 'unique:coord,routes_id,'.$model->id;
		}else{
			$unique = 'unique:coord,routes_id';

		}
        return \Validator::make($data, [
		 'auto' => 'required|string',
         'routes_id' => 'required|not_in:0|'.$unique,
	     //'data[coor]' => 'sometimes|required',
	     //'imya' => 'sometimes|string',
	     //'price' => 'sometimes|nullable|numeric',
        ],$messages);
		
    }
	
}
