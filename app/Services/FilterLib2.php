<?php
namespace App\Services;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibDegree\LibDegree;

class FilterLib2 {
    static function get(){
        $ar = [];
        //$ar['country'] = LibCountry::orderBy('name', 'asc')->get();
        //$ar['city'] = LibCity::orderBy('name', 'asc')->get();
        $ar['discpline'] = LibDiscipline::orderBy('name', 'asc')->get();
        $ar['degree'] = LibDegree::orderBy('name', 'asc')->get();
    
  

        return $ar;
    }
}
