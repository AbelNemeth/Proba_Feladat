<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    const STATUS_PENDING = 'fejlesztésre vár';
    const STATUS_IN_PROGRESS = 'folyamatban';
    const STATUS_COMPLETED = 'kész';

    protected $fillable = ['name', 'description', 'status'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'project_contact', 'project_id', 'contact_id');
    }
}
