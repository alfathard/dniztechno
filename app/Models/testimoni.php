<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class testimoni extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'testimonies';
    protected $primaryKey = 'idTestimoni';
    protected $fillable = [
       'titleTestimoni', 'textTestimoni', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
   {
       return LogOptions::defaults()
       ->setDescriptionForEvent(fn(string $eventName) => "Testimoni has been {$eventName}")
       ->useLogName('system')
       ->logOnly(['titleTestimoni', 'textTestimoni'])
       ->logOnlyDirty();
   }
}
