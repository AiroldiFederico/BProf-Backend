<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'description',
        'rate',
        'guest_name',
        'guest_email'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
