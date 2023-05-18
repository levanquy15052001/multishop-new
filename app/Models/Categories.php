<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'tbl_categories';

    public $timestamps = true;
}

// status = 0  UnActive
// status = 1  Active
