<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typefonction extends Model
{
    use HasFactory;

    protected $fillable = ['nom' ,'f_fonction_id'];

    public function fonction()
{
    return $this->belongsTo(FFonction::class, 'f_fonction_id');
}

}
