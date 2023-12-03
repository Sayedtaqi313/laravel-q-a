<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class Question extends Model
{
    use HasFactory;
    public $fillable = ['title', 'body', 'user_id'];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }


    public function getCustomeTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getUrlAttribute()
    {
        return "questions/" . $this->slug;
    }
    public function allowed($question) {
        if(Gate::allows('edit-question',$question)){
            return true;
        }else {
            return false;
        }
    }
}
