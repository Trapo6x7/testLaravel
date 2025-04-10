@extends ('layout')

@section('contenu')
    <div class="max-w-2xl mx-auto mt-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Les utilisateurs</h1>

        <ul class="bg-white rounded-lg shadow divide-y divide-gray-200">
            @foreach ($utilisateurs as $utilisateur)
                <li class="px-6 py-4 hover:bg-gray-50 transition duration-150 flex justify-between items-center">
                    <span class="text-gray-700">{{ $utilisateur->email }}</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('utilisateurs.edit', $utilisateur->id) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-sm">
                            Modifier
                        </a>
                        <form action="{{ route('utilisateurs.destroy', $utilisateur->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
