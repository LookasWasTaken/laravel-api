<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type_id', 'repo', 'slug'];

    public static function linkGenerator($projectName){
        $repo = 'https://github.com/LookasWasTaken/' . Str::slug($projectName, '-');
        return $repo;
    }

    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }
}
