<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model 
{

    protected static function boot()
    {
        parent::boot();
        
        static::registerModelEvents();
    }
    
    protected static function registerModelEvents()
    {
        $modelClassName = str_replace('App\\', '', static::class);
        $eventClassName = 'App\\Events\\Models\\' . $modelClassName . 'Event';
        if (!class_exists($eventClassName)) {
            return;
        }
        
        $supportedEvents = ['creating', 'created', 'updating', 'updated', 'saving', 'saved', 'deleting', 'deleted', 'restoring', 'restored'];
        $eventObj = new $eventClassName();
        foreach ($supportedEvents as $methodName) {
            if (!method_exists($eventObj, $methodName)){
                continue;
            }
            
            static::$methodName(function($model) use($eventClassName, $methodName) {
                $eventObj = new $eventClassName();
                return $eventObj->$methodName($model);
            });
        }
    }
}

