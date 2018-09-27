<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presma extends Model
{
    protected $table = 'tbl_presma';

    protected $primarykey = 'no_urut';

    // mematikan auto increment
    public $incrementing = false;

    // mematikan auto insert createat, updateat pada laravel
    public $timestamps = false;
}
