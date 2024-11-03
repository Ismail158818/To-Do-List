<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task_name','status','content','is_overdue','start_time','end_time','user_id','type_id'];
    public $timestamps = false;
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function user()
    {
        return $this->belongsTo( User::class);
    }
}

