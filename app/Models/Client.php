<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function storeOrUpdate($request, $client = null) {
        if ($client === null) {
            $client = new Client;
        }
        $client->fill($request->all());
        $client->save();
    }

    public function commets(){
        return $this->hasMany(Comment::class);
    }
}
