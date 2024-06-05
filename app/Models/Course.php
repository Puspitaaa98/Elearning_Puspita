<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'Courses';
    
    // Mendifinisikan kolom yang boleh di isi
    protected $fillable = ['name', 'category', 'description'];

}
