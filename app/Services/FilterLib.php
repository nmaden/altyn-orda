<?php
namespace App\Services;

use Modules\Entity\Model\LibCountry\LibCountry;
use Modules\Entity\Model\LibCity\LibCity;
use Modules\Entity\Model\LibDiscipline\LibDiscipline;
use Modules\Entity\Model\LibDegree\LibDegree;

class FilterLib {
    static function get(){
        $ar = [];
        $ar['country'] = LibCountry::orderBy('name', 'asc')->get();
        $ar['city'] = LibCity::orderBy('name', 'asc')->get();
        $ar['discpline'] = LibDiscipline::orderBy('name', 'asc')->get();
        $ar['degree'] = LibDegree::orderBy('name', 'asc')->get();
        $ar['cost'] = [
            '0-5000',
            '5000-10000',
            '10000-20000',
            '20000-50000',
            '50000'
        ];
        $ar['duration'] = [
            '1',
            '2',
            '3',
            '4'
        ];

        return $ar;
    }
}
