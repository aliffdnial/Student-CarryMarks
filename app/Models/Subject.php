<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['code','name', 'creditHours','type','lecturer_id'];
    
    public function Lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    //   public function Student(): HasMany
    //   {
    //       return $this->hasMany(Student::class, 'student_id', 'students');
    //   }
    public function Students(){
        return $this->belongsToMany(Student::class,'student_subject');
    }
}
