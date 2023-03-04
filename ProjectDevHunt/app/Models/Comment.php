<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_id', 'pub_id', 'user_id','content','created_at',
    ];

    protected $primaryKey = 'com_id';

    protected $table = 'comments';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function publications(){
        return $this->belongsTo('App\Models\Publication');
    }

}
