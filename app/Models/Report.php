<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function linkUser()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
