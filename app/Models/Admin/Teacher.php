<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'phone_number',
        'profile_picture',
        'description',
        'cv',
        'price',
        'remote'
    ];

    protected $table = 'teachers';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
