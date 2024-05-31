<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    protected $fillable = ['name', 'description', 'url', 'user_id', 'status_id'];
}
