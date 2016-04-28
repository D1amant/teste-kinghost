<?php

 namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reserve';


      /**
     * Get the phone record associated with the user.
     */
    public function User()
    {
        return $this->belongsTo('App\User');
    }


      /**
     * Get the phone record associated with the user.
     */
    public function Rooms()
    {
        return $this->belongsTo('App\Http\Models\Rooms');
    }

}