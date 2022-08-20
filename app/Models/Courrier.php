<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'expediteur',
        'destinateur',
        'adresse',
        'zone',
        'tracking_number',
        'ville_depart',
        'ville_arrive',
        'agent'

    ];

    public function postedepart(){
        return $this->hasOne(Poste::class,'id','ville_depart');
    }
    public function postearrive(){
        return $this->hasOne(Poste::class,'id','ville_arrive');
    }
    public function user(){
        return $this->hasOne(User::class,'id','agent');
    }
}
