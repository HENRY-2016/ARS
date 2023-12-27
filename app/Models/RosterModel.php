<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RosterModel extends Model
{
    use HasFactory;
    protected $table = 'roster_table';
    protected $guarded = array();
}
