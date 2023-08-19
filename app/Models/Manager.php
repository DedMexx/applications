<?php

namespace App\Models;

use Illuminate\Foundation\Auth\Manager as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];
}
