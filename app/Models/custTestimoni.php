<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class custTestimoni extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'cust_testimonies';
    protected $primaryKey = 'idCustTestimoni';
    protected $fillable = [
       'titlecustName', 'companyName', 'textCustTestimoni', 'imgFilepath', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
   {
       return LogOptions::defaults()
       ->setDescriptionForEvent(fn(string $eventName) => "Customer Testimoni has been {$eventName}")
       ->useLogName('system')
       ->logOnly(['titlecustName', 'companyName', 'textCustTestimoni','imgFilepath'])
       ->logOnlyDirty();
   }
}
