<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function get_users(Chat $chat)
    {
        $users = $chat->usuarios;

        return response()->json([
            'users' => $users
        ]);
    }

    public function get_messages(Chat $chat)
    {
        $messages = $chat->messages()->with('usuarios')->get();

        return response()->json([
            'messages' => $messages,
        ]);
    }

    public function chat_with(Usuarios $usuario)
    {
        $user_a = auth()->user();
        $user_b = $usuario;
    
        $chat = $user_a->chats()->whereHas('usuarios', function($q) use ($user_b) {
            $q->where('chat_usuarios.usuario_id', $user_b->usuario_id);
        })->first();
    
        if(!$chat){
            $chat = Chat::create([]);
            $chat->usuarios()->sync([$user_a->usuario_id, $user_b->usuario_id]);
        }
    
        return redirect()->route('chat.show', $chat);
    }
    

    public function show(Chat $chat)
    {
        abort_unless($chat->usuarios->contains(auth()->id()), 403);

        return view('chat.show', [
            'chat' => $chat
        ]);
    }

}
