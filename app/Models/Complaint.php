<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{

    protected $fillable = ['email','message','user_id','message_admin'];
    use HasFactory;
    public $timestamps = false;
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
