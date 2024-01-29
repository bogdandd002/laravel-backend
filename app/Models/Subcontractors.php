<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcontractors extends Model
{
    protected $table = 'subcontractors';
    use HasFactory;
    protected $fillable = [
        'id',
        'subconName',
         'suconActivities',
          'startDate',
   ];
}
