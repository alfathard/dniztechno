<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class contactinfo extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'contactsinfo';
    protected $primaryKey = 'idContactInfo';
    protected $fillable = [
       'typeContactInfo', 'textContactInfo', 'imgFilepath', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Contact Info has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['typeContactInfo', 'textContactInfo','imgFilepath'])
        ->logOnlyDirty();
    }
}
