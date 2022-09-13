<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    public $timstamps = true;
    protected $fillable = [ 'id', 'name', 'days', 'hours', 'project_id'];

    public function project() {
        return $this->belongsTo(Project::class); // select * from tasks where project_id=1
    }
}
