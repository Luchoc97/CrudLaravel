<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">
        Nuevo Proyecto
    </h1>

    <form method="POST"
          action="{{ route('projects.store') }}">

        @csrf

        <div class="mb-4">

            <label>Título</label>

            <input
                type="text"
                name="title"
                class="w-full rounded border p-2"
                required>

        </div>

        <div class="mb-4">

            <label>Descripción</label>

            <textarea
                name="description"
                class="w-full rounded border p-2"
                rows="4"
                required></textarea>

        </div>

        <div class="mb-4">

            <label>Estado</label>

            <select
                name="status"
                class="w-full rounded border p-2">

                <option value="En progreso">
                    En progreso
                </option>

                <option value="Finalizado">
                    Finalizado
                </option>

            </select>

        </div>

        <div class="mb-6">

            <label>Tecnología</label>

            <input
                type="text"
                name="technology"
                placeholder="Laravel, React..."
                class="w-full rounded border p-2">

        </div>

        <button
            class="bg-blue-600 text-white px-4 py-2 rounded btnG">

            Guardar proyecto

        </button>

    </form>

</div>

</x-app-layout>