<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;
    /*
     *  É possivel mudar a chave primária assim:
     *  protected $primarykey = 'nome_da_pk";
     * 
     *  Se não quiser que seja auto_increment
     *  public $increment = false;
     * 
     *  Para definir o tipo $Keytipe = 'string';
     * 
     *  Para tirar os campos timestamps
     *  public $timestamps = false;
     * 
     *  Anotações Azevedo
     */

    protected $fillable =[
        'id',
        'nome',
        'endereco',
        'email',
        'cell'
    ];

    protected $table = 'Funcionarios';
}
