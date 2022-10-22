<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivewireFrom extends Model
{
    use HasFactory;
    protected $table = 'livewire_froms';
    protected $fillable = [
        'email',
        'password',
        'address',
        'addressTwo',
        'city',
        'state',
        'zip',
        'check',
    ];
}
