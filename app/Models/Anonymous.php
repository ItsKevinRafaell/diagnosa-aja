<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anonymous extends Model
{
    use HasFactory;
    protected $guarded = [];

    function diseaseHistories() : BelongsTo {
        return $this->belongsTo(DiseaseHistory::class);
    }

    function diagnosisHistories() : BelongsTo {
        return $this->belongsTo(DiagnosisHistory::class);
    }
}
