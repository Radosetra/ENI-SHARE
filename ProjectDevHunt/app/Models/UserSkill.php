<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    protected $table = 'userskills';

    protected $primaryKey = ['user_id', 'skill_id'];

    public $incrementing = false;

    protected $fillable = ['user_id', 'skill_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
