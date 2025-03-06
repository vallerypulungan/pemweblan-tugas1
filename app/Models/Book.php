<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_book'; // Sesuaikan dengan primary key tabel
    public $timestamps = true; // Jika tabel memiliki created_at dan updated_at

    protected $fillable = ['title', 'author_id', 'published_year', 'price'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id_author');
    }
}

