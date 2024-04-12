<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'user_comment_id',
        'public_comment_id',
        'comment_content',
        'comment_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_comment_id');
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'public_comment_id');
    }
}
