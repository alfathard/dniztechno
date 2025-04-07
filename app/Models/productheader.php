<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class productheader extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'productheaders';
    protected $primaryKey = 'idProductHeader';
    protected $fillable = [
       'titleProductHeader', 'textProductHeader', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Product header has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['titleProductHeader', 'textProductHeader'])
        ->logOnlyDirty();
    }
}
