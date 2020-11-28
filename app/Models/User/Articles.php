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


    public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

}
