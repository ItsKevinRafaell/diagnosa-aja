<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiseaseHistory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'diseases_histories';

    function user() : HasMany {
        return $this->HasMany(User::class, 'user_id', 'id');
    }

    function anonymous() : HasMany {
        return $this->HasMany(Anonymous::class, 'anonymous_id', 'id');
    }
}
