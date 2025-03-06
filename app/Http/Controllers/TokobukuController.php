<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;



class TokobukuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::with('author')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%")
                             ->orWhereHas('author', function ($query) use ($search) {
                                 $query->where('name', 'like', "%$search%");
                             });
            })
            ->get();

        return view('welcome', compact('books', 'search'));
    }

    public function authors()
    {
        $authors = Author::with('books')->get(); 
        return view('authors', compact('authors'));
    }


    public function books()
    {
        $books = Book::with('author')->get(); 
        $authors = Author::all(); 

        return view('books', compact('books', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id_author', 
            'published_year' => 'required|integer|min:1800|max:2025',
            'price' => 'required|numeric|min:0',
        ]);
        
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'published_year' => $request->published_year,
            'price' => $request->price,
        ]);
        
        
        return redirect()->route('tokobuku.books')->with('success', 'Buku berhasil ditambahkan!');
    
    }

    

}
