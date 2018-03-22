<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public $fillable = ['site_name', 'address', 'contact_number', 'contact_email'];
}
