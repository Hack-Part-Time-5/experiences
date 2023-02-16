<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'company',
        'role',
        'description',
        'from',
        'to'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tools(){
        return $this->belongsToMany(Tool::class, 'experiences_tools');
    }
}
