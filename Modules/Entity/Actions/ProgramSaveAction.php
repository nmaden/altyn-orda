<?php
namespace Modules\Entity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\UploadPhoto;


class ProgramSaveAction {
    private $model = false;
    private $request = false;

    function __construct(Model $model, Request $request){
		
        $this->model = $model; 
        $this->request = $request; 
    }

    function run(){
		
        $this->saveMain();
        $this->saveDiscipline();
    }

    private function saveMain(){
		//dd($this->request->note);
		$arr_note = explode('|',$this->request->note);
		$this->request->note = serialize($arr_note);
		
		 
        $ar = $this->request->all();
        $ar['edited_user_id'] = $this->request->user()->id;

        $this->model->fill($ar);
        $this->model->save();
    }

    private function saveDiscipline(){
        if (!method_exists($this->model, 'relDiscipline'))
            return true;
           
        $this->model->relDiscipline()->delete();

        if (is_array($this->request->discipline_id) && count($this->request->discipline_id)){
            foreach ($this->request->discipline_id as $discipline_id) {
                $this->model->relDiscipline()->create(['discipline_id' => $discipline_id,'univer_id'=>$this->request->univer_id]);
            }
        }
    }
}