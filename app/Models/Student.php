<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // Mendifinisikan kolom yang boleh di isi
    protected $fillable = ['name', 'nim', 'major', 'class', 'course_id'];

    /**
     * ================================================================
     * laravel Relationship method:
     * =====================================
     * 1. One to One
     *   -hasOne()          = tabel saat ini meminjamkan /key ke tabel lain
     *   -belongsTo()       = tabel saat ini MEMINJAM /key dari tabel lain
     * 2. One to Many  / Many to One
     *   -hasMany()         = tabel saat ini meminjamkan /key ke tabel lain
     *   -belongsToMany()   = tabel saat ini MEMINJAM /key dari tabel lain
     */

    //mendefinisikan relasi ke model Course
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}
