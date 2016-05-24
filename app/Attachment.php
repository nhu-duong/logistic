<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id', 'file_name', 'mime', 'created_by'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
    
    public function getSize()
    {
        $path = $this->getRealPath();
        if (!file_exists($path)) {
            return 'N/A';
        }
        return \Illuminate\Support\Facades\File::size($this->getRealPath());
    }
    
    /**
     * 
     */
    public function getRealPath()
    {
        return storage_path() . '/' . $this->getPath();
    }
    
    public function getPath()
    {
        $path = \Illuminate\Support\Facades\Config::get('filesystems.attachments.path');
        return $path . '/' . $this->order_id . '/' . $this->file_name;
    }
    
    public function getDownloadPath()
    {
        
    }
}
