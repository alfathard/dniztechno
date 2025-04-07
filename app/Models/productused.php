<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class productused extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'productuseds';
    protected $primaryKey = 'idProductUsed';
    protected $fillable = [
       'textProductUsed', 'idProduct', 'imgFilepath', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Product used has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['textProductUsed', 'idProduct', 'imgFilepath'])
        ->logOnlyDirty();
    }
}
