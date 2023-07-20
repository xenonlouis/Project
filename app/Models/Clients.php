<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Nom', 'Prénom', 'Adresse', 'Ville', 'Email', 'Tel_fix', 'Tel_Portable',
        'Position', 'Fax', 'Tel_Portable2', 'Tel_Fix2', 'Intitulé', 'Commentaire',
        'updated_at', 'created_at'
    ];
}
