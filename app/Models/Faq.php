<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'question_ms',
        'answer',
        'answer_ms',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getLocalizedQuestionAttribute(): string
    {
        $locale = app()->getLocale();
        if ($locale === 'ms' && !empty($this->question_ms)) {
            return $this->question_ms;
        }
        return $this->question;
    }

    public function getLocalizedAnswerAttribute(): string
    {
        $locale = app()->getLocale();
        if ($locale === 'ms' && !empty($this->answer_ms)) {
            return $this->answer_ms;
        }
        return $this->answer;
    }
}
