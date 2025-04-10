@extends('layout')

@section('contenu')
    <form action="/connexion" method="post">
        {{ csrf_field() }}
        <p> <input class="input" type="email" name="email" placeholder="Email" value="{{ old('email') }}"> </p>
        @if ($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
        <p> <input class="input" type="password" name="password" placeholder="Mot de passe"> </p>
        @if ($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
        <div class="mt-6">
            <input
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200"
                type="submit" value="Se connecter">
        </div>
    </form>
@endsection
