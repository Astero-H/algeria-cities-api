<?php

namespace App\Services;

abstract class BaseService {

    /* Check if the searched city's name is included into one of existing string or if the name match  */
    public function handleDataList(string $name, array $data, $field = 'name') {
        $fountObjects = [];
        $nameObj = strtolower($name);
        foreach($data as $dataObj) {
            if(strcmp(strtolower($dataObj[$field]) , $nameObj) == 0 || strpos(strtolower($dataObj[$field ]), $nameObj) !== false) {                 
                array_push($fountObjects, $dataObj);
            } 
        }
        return $fountObjects !== [] ? $fountObjects : null ;
    }

}
