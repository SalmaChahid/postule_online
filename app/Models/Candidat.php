<?php
// في ملف Candidat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'tel', 'email', 'ville', 'type_piece', 'num_piece',
        'offre_d_emploi', 'fonction', 'type_de_fonction', 'niveau_d_étude', 'cv', 'message',
    ];
}
