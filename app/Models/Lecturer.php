<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecturer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['lectID','name', 'email'];

    // public function Subject(): BelongsTo
    // {
    //     return $this->belongsTo(Subject::class, 'subject_id', 'subject');
    // }
    public function Subject(): HasMany
    {
        return $this->hasMany(Subject::class, 'lecturer_id');
    }
}
