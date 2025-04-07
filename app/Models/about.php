<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;



class about extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    //  protected $table = "abouts";
     protected $primaryKey = 'idAbout';
     protected $fillable = [
        'titleAbout', 'textAbout', 'created_by', 'updated_by'
        ];
    protected $dates = ['deleted_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "About has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['titleAbout', 'textAbout'])
        ->logOnlyDirty();
    }

    // protected $hidden = [
    //     'created_at', 'modified_at', 'created_by', 'modified_by'
    //     ];
}
