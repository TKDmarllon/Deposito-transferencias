<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class Account extends Model
{
    protected $table='account';
    protected $fillable=['fullname','cpf','cnpj','email','password','balance'];
    
}