<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication_tag extends Model
{
    use HasFactory;
    protected $fillable =[
        'pub_id',
        'tag_id',
    ];
    protected $table = 'publication_tags';
    public function pub(){
        return $this->belongsTo(Publication::class, 'pub_id');
    }
   
    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }
   
}