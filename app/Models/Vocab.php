<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocab extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function linkFavorite()
    {
        return $this->hasMany(Favorite::class, 'id_model', 'id')->where('model', 'vocab');
    }
}
