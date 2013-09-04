<?php

class LessonDate extends Resource {
    protected $guarded = [];

    public static $rules = [
    ];

    protected $relations_to = [
        'Lesson',
        'LessonDate',
    ];

    public function lesson()
    {
        return $this->belongsTo('Lesson');
    }

    public function template()
    {
        return $this->belongsTo('LessonDate');
    }
}