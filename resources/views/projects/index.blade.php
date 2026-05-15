<x-app-layout>

<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between">

        <h1 class="text-3xl font-bold">
            Mis Proyectos
        </h1>

        <a href="{{ route('projects.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded btnG">

            Nuevo proyecto

        </a>

    </div>

    <div class="mt-6">

        @forelse($projects as $project)

            <div class="p-6 border rounded mb-4">

                <h2 class="font-bold text-xl">
                    {{ $project->title }}
                </h2>

                <p class="mt-2 descripcion">
                    {{ $project->description }}
                </p>

                <div class="mt-3">

                    <span class="px-2 py-1 rounded">

                        {{ $project->technology }}

                    </span>

                    <span class="px-2 py-1 rounded">

                        {{ $project->status }}

                    </span>

                </div>

                <div class="mt-4 flex gap-2">

                    <a href="{{ route('projects.edit',$project) }}"
                    class="bg-yellow-500 text-white px-3 py-2 rounded btnG">

                        Editar

                    </a>


                    <form method="POST"
                        action="{{ route('projects.destroy', $project) }}" 
                        method="POST"
                        onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?')">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-500 text-white px-3 py-2 rounded">
                            Eliminar
                        </button>

                    </form>

                </div>

            </div>

            @empty

            <p>No tienes proyectos todavía.</p>

        @endforelse

    </div>

</div>

</x-app-layout>