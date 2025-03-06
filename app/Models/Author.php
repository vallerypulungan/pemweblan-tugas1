<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $table = 'authors';
    protected $primaryKey = 'id_author';
    protected $fillable = ['name', 'birth_year'];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id', 'id_author');
    }

}
