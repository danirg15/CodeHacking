<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Photo extends Model {

    protected $directory = '/images/';

    protected $fillable = [
        'path'
    ];


    public static function generateRandomName($file){
        $name = md5(time() . $file->getClientOriginalName());
        $name .= '.' . $file->getClientOriginalExtension(); 
        return $name;
    }

    public function getPathAttribute($path){
        return $this->directory . $path;
    }

}
