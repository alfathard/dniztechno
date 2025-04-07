<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class vision extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $primaryKey = 'idVision';
    protected $fillable = [
       'titleVision', 'textVision', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
   {
       return LogOptions::defaults()
       ->setDescriptionForEvent(fn(string $eventName) => "Vision has been {$eventName}")
       ->useLogName('system')
       ->logOnly(['titleVision', 'textVision'])
       ->logOnlyDirty();
   }
}
