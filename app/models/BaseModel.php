<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseModel extends Eloquent
{
    /**
     * Model rules
     * @var array
     */
    public static $rules = [];
    
    
    /**
     * 
     * @return type
     */
    public function updateRules() {
        $rules = static::$rules;
        foreach ($rules as $field => $rule)
        {
            $rules[$field] = str_replace(':id', $this->getKey(), $rule);
        }
        return $rules;
    }
}

