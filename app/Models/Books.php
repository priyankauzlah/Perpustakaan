<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    //kolom database yang bisa diisi di postman secara massal
    protected $fillable = [
        'nisbn',
        'title',
        'description',
        'image_url',
        'rating',
        'stock',
        'publisher_id',
        'author_id'
    ];

    //kolom database yang seharusnya tidak ditampilkan pada json
    protected $hidden = [
        'author_id',
        'publisher_id'
    ];

    //kolom database yang perlu dikonversi menjadi tipe tertentu
    protected $casts = [
        'rating' => 'double',
        'stock' => 'int'
    ];
}
