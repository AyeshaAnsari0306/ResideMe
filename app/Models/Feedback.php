<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $table = 'feedbacks';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'login_id', 'email', 'message', 'status',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'login_id', 'login_id');
    }
}
