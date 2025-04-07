<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventlog extends Model
{
    use HasFactory;
    protected $table = 'eventlogs';
    protected $primaryKey = 'idEvent';
    protected $fillable = [
       'idUser', 'eventLog', 'created_by', 'created_date', 'created_time'
       ];
}
