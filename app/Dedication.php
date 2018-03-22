<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dedication extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function approved_user()
    {
        return $this->belongsTo( User::class, 'approved_user_id', 'id');
    }

}
