<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class article extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'articles';
    protected $primaryKey = 'idArticle';
    protected $fillable = [
       'titleArticle', 'textArticle', 'imgFilepath', 'created_by', 'updated_by'
       ];
   protected $dates = ['deleted_at'];

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Article has been {$eventName}")
        ->useLogName('system')
        ->logOnly(['titleArticle', 'textArticle', 'imgFilepath'])
        ->logOnlyDirty();
    }
}
