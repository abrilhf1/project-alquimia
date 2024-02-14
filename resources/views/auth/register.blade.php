@extends('layouts.main')
@section('title', 'Registrarse')

@section('main')
    <section class="regis">
        @if (Session::has('message.success'))
            <div class="alert alert-success">{!! Session::get('message.success') !!}</div>
        @endif
        <div class="regisSection">
            <div class="alquimiaBlanco"></div>
            <h1>Registrarse</h1>
            <form action="{{ route('auth.registerAction') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="step" id="step1">
                    <!-- Step 1: Email y Contraseña -->
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="ejemplo@gmail.com.ar" id="email"
                            class="form-control" @if ($errors->has('email')) aria-describedby="error-email" @endif>
                        @error('email')
                            <div class="text-danger" id="error-email">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="password form-label ">Contraseña</label>
                        <div class="password-field">
                            <input type="password" name="password" id="password" class="form-control"
                                @if ($errors->has('password')) aria-describedby="error-password" @endif>
                            <span class="toggle-password" onclick="togglePasswordVisibility()"><ion-icon
                                    name="eye-outline"></ion-icon></span>
                        </div>
                        @error('password')
                            <div class="text-danger" id="error-password">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn next-step">Siguiente</button>
                </div>

                <div class="step" id="step2" style="display: none;">
                    <!-- Step 2: Nombre y Rol -->
                    <div class="row">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" placeholder="Tu nombre" id="nombre" class="form-control"
                                @if ($errors->has('nombre')) aria-describedby="error-nombre" @endif>
                            @error('nombre')
                                <div class="text-danger" id="error-nombre">{{ $errors->first('nombre') }}</div>
                            @enderror
                        </div>
                    </div>

                    <p class="mt-3">¡Bienvenido a nuestra comunidad alquímica! Aquí te explicamos cómo funcionan los
                        roles. </p>
                    <p>El Alquimista Donante tiene el privilegio de donar y adquirir elementos en nuestro mercado, mientras
                        que el Alquimista Consumidor puede elegir entre las propuestas de los donadores. Ambos roles se
                        complementan en nuestra comunidad, donde la colaboración y el intercambio son fundamentales.</p>
                    <div class="row">
                        <div class="col">
                            <label for="roles_id">Rol</label>
                            <select class="form-select" id="roles_id" name="roles_id" required>
                                <option value="">Seleccionar un rol</option>
                                @foreach ($roles as $rol)
                                    @if ($rol->nombre !== 'Administrador')
                                        <option value="{{ $rol->roles_id }}">{{ $rol->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="botones container">
                        <button type="button" class="btn mt-4 prev-step">Anterior</button>
                        <button type="button" class="btn mt-4 next-step">Siguiente</button>
                    </div>
                </div>

                <div class="step" id="step3" style="display: none;">
                    <!-- Step 3: Avatar y Ubicación -->
                    <div class="col">
                        <p>Elegí tu avatar:</p>
                        @foreach ($avatares as $avatar)
                            <label class="radio-avatar">
                                <input type="radio" name="avatar_id" value="{{ $avatar->avatar_id }}">
                                <span class="checkmark">
                                    <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                                </span>
                                <img src="{{ asset('img/avatares/' . $avatar->avatar) }}" alt="{{ $avatar->avatar }}"
                                    class="avatar-registro">
                            </label>
                        @endforeach

                    </div>
                    <div class="col">
                        <label for="province_id" class="mt-5">Provincia</label>
                        <select class="form-select" id="province_id" name="province_id" required>
                            <option value="">Seleccionar una provincia</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->province_id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="city_id" class="mt-5">Ciudad</label>
                        <select class="form-select" id="city_id" name="city_id" required>
                            <option value="">Seleccionar una ciudad</option>
                            <!-- Las opciones de las ciudades se cargarán automáticamente cuando se seleccione una provincia -->
                            @isset($cities)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->city_id }}" data-province="{{ $city->province_id }}">
                                        {{ $city->name }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="botones">
                        <button type="button" class="btn mt-4 prev-step">Anterior</button>
                        <button type="submit" class="btn mt-4">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="{{asset('js/filtroUbicacion.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
    <script src="{{asset('js/stepsRegister.js')}}"></script>
@endsection