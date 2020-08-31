<?php
namespace App\Services;

use Auth;
use Modules\Entity\Model\StudentData\StudentData as Model;

class StudentData {
    static function get(){
        $user = Auth::user();
        if (!$user)
            return new Model();

        $data = Model::where('user_id', $user->id)->first();
        if (!$data)
            return new Model();
        

        return $data;
    }
}
