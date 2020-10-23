<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BLE extends Model{
    protected $fillable = ['subjectid','year','term','section','studentid','point'];
}