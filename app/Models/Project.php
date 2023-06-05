<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'repo'];

    public static function linkGenerator($projectName){
        $repo = 'https://github.com/LookasWasTaken/' . Str::slug($projectName, '-');
        return $repo;
    }
}
