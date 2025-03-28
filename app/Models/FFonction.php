<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FFonction extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function types()
{
    return $this->hasMany(typefonction::class ,'f_fonction_id');
}

}
