<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $table = 'students';
    protected $fillable = ['studID','name', 'email'];

    // public function Subject(): BelongsToMany
    // {
    //     return $this->belongsToMany(Subject::class);
    // }
    public function Subject(){
        return $this->belongsToMany(Subject::class,'student_subject');
    }
}