<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class productfeature extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'productfeatures';
    protected $primaryKey = 'idProductFeature';
    protected $fillable = [
       'textProductFeature', 'idProduct', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Product feature has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['textProductFeature', 'idProduct'])
        ->logOnlyDirty();
    }
}
