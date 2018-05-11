<?php

namespace App\Events\Models;

class ItemEvent
{
    public function creating($model)
    {
        dd($model);
    }
}

