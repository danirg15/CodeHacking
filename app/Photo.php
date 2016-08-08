<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    protected static $directory = '/images/';

    protected $fillable = [
        'path'
    ];    

    public function getPathAttribute($path){
        return Photo::$directory . $path;
    }

    /**Helper**/
    public static function getPlaceholderImage(){
        return Photo::$directory . 'placeholder.png';
    }

    public static function generateRandomName($file){
        $name = md5(time() . $file->getClientOriginalName());
        $name .= '.' . $file->getClientOriginalExtension(); 
        return $name;
    }

    public static function uploadPhoto(Request $request){

        if ($file = $request->file('photo')) {
            $name = Photo::generateRandomName($file);
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            return $photo->id;
        }

        return NULL;
    }

    public static function removePhoto($photo_id){
        $photo = Photo::findOrFail($photo_id);
        unlink(public_path() . $photo->path);
        $photo->delete();
    }

}
