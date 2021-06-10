<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
      'id', 'type', 'user_id', 'status'
    ];
}
