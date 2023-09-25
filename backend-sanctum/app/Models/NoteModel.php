<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory, HasUuids;
    public $incrementing = false;
    protected $table = 'user_notes';
    public $fillable = [
        'judul_notes',
        'isi_notes',
        'id_user'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
