<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'surname', 'birth_date',  'gender'];

    protected $searchableFields = ['*'];

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }
}
