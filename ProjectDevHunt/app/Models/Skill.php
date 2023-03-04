<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['skill_id','libelle'];

    protected $table = 'skills';

    protected $primaryKey = 'skill_id';

    public function users()
    {
        return $this->belongsToMany(User::class, 'userskills', 'skill_id', 'user_id');
    }
}
