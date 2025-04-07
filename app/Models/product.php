<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'products';
    protected $primaryKey = 'idProduct';
    protected $fillable = [
       'nameProduct', 'descProduct', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Product has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['nameProduct', 'descProduct', 'imgFilepath'])
        ->logOnlyDirty();
    }
}
