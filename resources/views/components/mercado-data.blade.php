<?php
use Illuminate\Support\Facades\Storage;
/** @var \App\Models\mercados $empresa */
?>

<div class="empresa row">
    <div class="col-md-6">
        <x-mercado-img :mercado="$mercado" />
    </div>
    <div class="col-md-6">
        <div class="infoEmpresa">
            <div class="autorDate">
                <h2 class="fs-5"><span class="textoBlanco">Elemento:</span> {{ $mercado->titulo }}</h2>
                <p class="small text-muted">Fecha: 20/05/2023</p>
                <p><span class="textoBlanco">Precio:</span> {{ $mercado->precio }} </p>
                <p><span class="textoBlanco">Ubicación:</span> {{$mercado->ubicacion->province->name}} - {{$mercado->ubicacion->city->name}} {{$mercado->ubicacion->city->department}}</p>
                {{-- <a class="btn constume-btn-chatMercado m-2" href="{{route('chat.with', ['id' => $mercado->usuario->usuario_id])}}">Chat</a> --}}
                <p class="small text-muted chatExplicacion">Podés inciar un chat de conversación con el vendedor para
                    realizar cualquier consulta.</p>
            </div>
        </div>
    </div>
    <p class="mt-3">Descripción: {{ $mercado->caracteristica }}</p>

</div>
