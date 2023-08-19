<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public static function store($request, $clientId) {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->client_id = $clientId;
        $comment->save();
    }
}
