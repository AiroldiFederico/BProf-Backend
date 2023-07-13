<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
