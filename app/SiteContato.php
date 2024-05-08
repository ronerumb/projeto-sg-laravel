<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteContato extends Model
{
    protected $table = 'site_contatos';
    protected $fillable = ['nome', 'telefone', 'email','motivo_contato','mensagem'];
}
