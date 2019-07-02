<?php

namespace App\Transformers;

use App\Timetable;
use League\Fractal\TransformerAbstract;

class TimetableTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Timetable $timetable)
    {
        return [
            'id' => (int)$timetable->table_id,
            'course_id' => (int)$timetable->course_id,
            'type' => (string)$timetable->type,
            'startTime' => (string)$timetable->start_time,
            'endTime' => (string)$timetable->end_time,
            'day' => (string)$timetable->day,
            'venue' => (string)$timetable->venue,
            'creationDate' => (string)$timetable->created_at,
            'lastChange' => (string)$timetable->updated_at,
            
            'courseDetails' => $timetable->courses,
            // 'courseDetails' => $timetable->courses->course_code,
        ];
    }
}
