<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Virement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'motif',
        'user_id',
        'beneficiaire_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function beneficiaire(){
        return $this->belongsTo(User::class);
    }
}
