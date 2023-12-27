<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckPointsModel extends Model
{
    use HasFactory;
    protected $table = 'checkpoints_table';
    protected $guarded = array();
}
