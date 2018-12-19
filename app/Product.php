<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function purchase($username) {
        $p = self::where("status", "=", 0)->orderBy("id")->first();
        $p->status = 1;
        $p->purchased_by = $username;
        $p->purchased_at = date("Y-m-d H:i:s");
        $p->save();
        return $p;
    }
    
    public function activate($username, $code) {
        $p = self::where('purchased_by', '=', $username)
                ->where('code', '=', $code)->first();
        if (empty($p)) {
            return -1;
        }
        if ($p->status == 2) {
            return 0;
        }
        $p->status = 2;
        $p->activated_by = $username;
        $p->activated_at = date('Y-m-d H:i:s');
        $p->save();
        return 1;
    }
}
