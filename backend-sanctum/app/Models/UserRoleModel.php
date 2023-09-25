<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $table = 'user_role';
    public $fillable = [
        'kode_role',
        'nama_role',
    ];
}
