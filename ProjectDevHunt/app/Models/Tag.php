<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =[
        'tab_id',
        'nom'
    ];
    protected $table = 'tags';
    protected $primaryKey = 'tab_id';
}
