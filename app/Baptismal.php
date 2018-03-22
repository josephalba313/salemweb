<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Baptismal extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approved_user()
    {
        return $this->belongsTo( User::class, 'approved_user_id', 'id');
    }

}
