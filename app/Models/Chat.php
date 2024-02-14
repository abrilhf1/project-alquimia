<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @mixin \Eloquent
 */
class Chat extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'chat_id';
    
    public function usuarios()
    {
        return $this->belongsToMany(Usuarios::class, 'chat_usuarios', 'chat_id', 'usuario_id');
    }

    public function messages() 
    {
        return $this->hasMany(Message::class);
    }
}
