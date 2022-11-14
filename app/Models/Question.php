<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'survey_id',
        'question',
    ];

    /**
     * Связи
     */
    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
