<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class mission extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $primaryKey = 'idMission';
    protected $fillable = [
       'titleMission', 'textMission', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
   {
       return LogOptions::defaults()
       ->setDescriptionForEvent(fn(string $eventName) => "Mission has been {$eventName}")
       ->useLogName('system')
       ->logOnly(['titleMission', 'textMission'])
       ->logOnlyDirty();
   }
}
