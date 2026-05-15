<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl mb-6">

    Editar Proyecto

    </h1>

    <form method="POST" action="{{ route('projects.update',$project) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $project->title }}" class="w-full rounded border p-2 mb-4">


        <textarea name="description" class="w-full rounded border p-2 mb-4">
            {{ $project->description }}
        </textarea>


        <select name="status" class="w-full rounded border p-2 mb-4">

        <option{{ $project->status=="En progreso" ? "selected":"" }}>En progreso</option>

        <option
            {{ $project->status=="Finalizado" ? "selected":"" }}>Finalizado
        </option>

        </select>


        <input type="text" name="technology" value="{{ $project->technology }}" class="w-full rounded border p-2 mb-4">


        <button class="bg-blue-600 text-white px-4 py-2 rounded btnG">Actualizar</button>

    </form>

</div>

</x-app-layout>