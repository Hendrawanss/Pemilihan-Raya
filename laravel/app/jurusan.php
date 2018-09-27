<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'tbl_jurusan';

    protected $primarykey = 'id_jurusan';

    // mematikan auto insert createat, updateat pada laravel
    public $timestamps = false;
}
