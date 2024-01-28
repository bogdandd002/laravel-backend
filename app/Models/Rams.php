<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rams extends Model
{   
    protected $table = 'rams';
    protected $primaryKey ='id';
    use HasFactory;
    protected $fillable = [
         'ramsTitle',
          'ramsSubcon',
           'revNumber',
           'revDate',
            'ramsStatus'
    ];
}
