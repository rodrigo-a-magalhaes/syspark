<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    //

    public $rules = [
        'placa' => 'required|min:8|max:8',
        'modelo' => 'required|min:3|max:100',
        'cor' => 'required|min:3|max:100'
    ];


}
