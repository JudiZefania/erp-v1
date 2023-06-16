<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machine';
    protected $primaryKey = 'id';
    protected $fillable = ['nomMachine', 'type', 'marque','nomUtilisateur','departement','compagnie','date','dateLimite'];  

    use HasFactory;
}
