<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'answer',
        'next_question',
    ];

    /**
     * Связи
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
