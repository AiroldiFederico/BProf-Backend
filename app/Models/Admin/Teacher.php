<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
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
    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }
    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
