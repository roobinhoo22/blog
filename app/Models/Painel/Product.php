<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','number','active','category','description','image'
    ]; // quais colunas pode ser passada pelo usuario
    //protected $guarded = ['']; // quais colunas não pode ser passada pelo usuário 
}
