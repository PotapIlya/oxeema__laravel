<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $guarded = ['id'];


    public function author()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
	public function comments()
	{
		return $this->hasMany(Comment::class, 'article_id', 'id');
	}
	public function likes()
	{
		return $this->hasMany(Like::class, 'article_id', 'id');
//		return $this->hasMany(Like::class, 'article_id', 'id')->where('status', true);
	}

}
