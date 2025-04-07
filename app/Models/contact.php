<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class contact extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'contacts';
    protected $primaryKey = 'idContactUs';
    protected $fillable = [
       'titleContactUs', 'textContactUs', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Contact Us has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['titleContactUs', 'textContactUs'])
        ->logOnlyDirty();
    }
}
