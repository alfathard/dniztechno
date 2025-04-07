<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class contactlist extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'contactslist';
    protected $primaryKey = 'idContact';
    protected $fillable = [
       'nameContact', 'emailContact', 'textContact', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
   {
       return LogOptions::defaults()
       ->setDescriptionForEvent(fn(string $eventName) => "Contact List has been {$eventName}")
       ->useLogName('system')
       ->logOnly(['nameContact', 'emailContact', 'textContact'])
       ->logOnlyDirty();
   }
}
