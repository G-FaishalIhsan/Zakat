<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DistribusiZakat extends Model
{
    use HasFactory;
    protected $table = 'distribusi_zakat';
    protected $guarded = [];
}
