<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaForum extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    public function linkUser()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function linkForum()
    {
        return $this->hasMany(Forum::class, 'id_tema_forum', 'id')->latest();
    }
}
