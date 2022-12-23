<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faturamento extends Model
{
    use HasFactory;

    protected $table = 'faturados_sankhya';
    public $timestamps = false;
    public $incrementing = false;
    protected $connection = 'pqsql2';

}
