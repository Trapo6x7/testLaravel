@extends ('layout')

@section('contenu')
      <nav class="flex flex-col items-center justify-center min-h-screen text-gray-500">
        <!-- Lien vers le formulaire d'inscription -->
        <a href="{{ route('utilisateurs.create') }}">Inscription</a>

        <!-- Lien vers le formulaire de connexion -->
        <a href="{{ route('connexion.form') }}">Connexion</a>

        <!-- Lien vers la liste des utilisateurs -->
        <a href="{{ route('utilisateurs.liste') }}">Voir les utilisateurs</a>
    </nav>
@endsection
