<?php

namespace App\Services;

abstract class BaseService {

    public function cleaningExpression($string) {
        $accents = ['è', 'é', 'ê', 'ë' , 'ï'];
        $replacements = ['e', 'e', 'e', 'e', 'i'];
        $replacedString = str_replace($accents, $replacements, $string);
        $removeSDashes = preg_replace('/-/', '', $replacedString); 
        $removeApostrophe = preg_replace("/'/", '', $removeSDashes); 
        $result = str_replace(' ', '', $removeApostrophe);
        return $result;
    }

    /* Check if the searched city's name is equal to the string or included into the string  */
    public function handleDataListWithName(string $name, array $data, string $field = 'name') {
        $fountObjects = [];
        $nameObj = strtolower(str_replace(' ', '', $name));
        foreach($data as $dataObj) {
            $dataObjField = $this->cleaningExpression($dataObj[$field]);
            if(strcmp(strtolower($dataObjField) , $nameObj) == 0 || strpos(strtolower($dataObjField), $nameObj) !== false) {           
                array_push($fountObjects, $dataObj);
            } 
        }
        return $fountObjects !== [] ? $fountObjects : null ;
    }

     /* Check if the searched city's name is equal to the string or included into the string  */
     public function handleDataListWithId(array $data, int $id, string $field ='wilaya_code') {
        $fountObjects = [];
        foreach($data as $dataObj) {
            if ((int)$dataObj[$field] === (int) $id) {         
                array_push($fountObjects, $dataObj);
            } 
        }
        return $fountObjects !== [] ? $fountObjects : null ;
    }

}
