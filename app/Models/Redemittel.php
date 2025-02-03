<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redemittel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function linkFavorite()
    {
        return $this->hasMany(Favorite::class, 'id_model', 'id')->where('id_user', auth()->user()->id)->where('model', 'redemittel');
    }
}
