@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> THan habido problemas con sus datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        Nombres:
        <input type="text" name="first_name" value="{{ old('first_name') }}">
    </div>

    <div>
        Apellidos:
        <input type="text" name="last_name" value="{{ old('last_name') }}">
    </div>

    <div>
        Email:
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Contraseña:
        <input type="password" name="password">
    </div>

    <div>
        Confirmar contraseña:
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>