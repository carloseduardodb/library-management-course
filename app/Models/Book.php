<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'page_count', 'category_id'];

    protected $searchableFields = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
