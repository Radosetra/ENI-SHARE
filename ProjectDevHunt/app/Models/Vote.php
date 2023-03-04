<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['vote_id','user_id','pub_id','type'];

    protected $table = 'votes';

    protected $primaryKey = 'vote_id';
}
