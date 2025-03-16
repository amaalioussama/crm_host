<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'country',
        'status',
        'employee_of',
        'comment',
    ];

    // If you want to associate this employee with a user, you can create a relationship with the User model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
