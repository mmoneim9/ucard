<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rechargelog extends Model
{
    use HasFactory;
    protected $table = "rechargelog";
    public $timestamps = false;
}
