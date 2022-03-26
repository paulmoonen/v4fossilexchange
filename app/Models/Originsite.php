<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Originsite extends Model
{
    use HasFactory;
    protected $table = 'originsites';
    protected $fillable = [ 'name',
                            'description',
                            'country'
                        ];
}
