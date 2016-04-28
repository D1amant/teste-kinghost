<?php

 namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Reserve');
    }


    public static function getArray()
    {
    	$models = Rooms::all();
        $array = [];
        foreach ($models as $model) {
            $array[$model->id] =  $model->name;
        }
        return $array;
    }
}