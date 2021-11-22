<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'age', 'gender'];

    protected $searchableFields = ['*'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
