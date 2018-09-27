<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemilih extends Model
{
    protected $table = 'tbl_pemilih';

    protected $primarykey = 'nim';

    // mematikan auto increment
    public $incrementing = false;

    // mematikan auto insert createat, updateat pada laravel
    public $timestamps = false;
}
