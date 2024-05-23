<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    use HasFactory;

   protected $table = 'student_add_fees';

static public function getSingle($id)
{
    return self::find($id);
}

    public static function getGrades($student_id)
    {
        return self::where('student_id', $student_id)->get();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
