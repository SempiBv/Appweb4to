<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    public $table = 'rol';

    public $fillable = ['vendedor','panadero'];

    

    public function empleado(){
        return $this->belongTo('empleado::class');
    }
}
