<div class="bg-blue-50 px-6 py-10 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-8">
        <div class="w-full md:w-3/4">
            <x-input wire:model.live="search" type="text" class="w-full bg-blue-100 text-blue-900 placeholder-blue-600 rounded-lg shadow-md border border-blue-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 px-4 py-3" name="search" placeholder="Buscar curso..." />
        </div>
        <div class="md:w-1/4 md:ml-6 flex justify-end">
            <a href="{{ route('teams.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg text-sm py-2.5 px-5 text-center inline-flex items-center transition-colors duration-300 ease-in-out shadow-lg">
                Crear Curso
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full w-full divide-y divide-blue-200">
            <thead class="bg-blue-200">
                <tr>
                    <th scope="col" wire:click="sortBy('name')" class="px-6 py-3 text-left text-sm font-bold text-blue-900 uppercase tracking-wide cursor-pointer">
                        Nombre
                        @if ($sortField === 'name')
                            @if ($sortDirection === 'asc')
                                <span>&#9650;</span>
                            @else
                                <span>&#9660;</span>
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-bold text-blue-900 uppercase tracking-wide">
                        Fecha de Creación
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-sm font-bold text-blue-900 uppercase tracking-wide">
                        Usuarios
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-blue-100">
                @if ($teams->count() > 0)
                    @foreach ($teams as $team)
                        <tr class="hover:bg-blue-100 transition-colors duration-300">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">
                                {{ $team->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-700">
                                {{ $team->created_at->format('d/m/Y H:i:s') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-blue-700">
                                {{ $team->users()->count() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="text-blue-800 hover:text-purple-500 transition duration-200 ease-in-out" onclick="window.location.href = '{{ route('teams.show', $team->id) }}'">
                                    <span class="material-symbols-outlined">folder_managed</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm text-blue-700">No hay equipos disponibles</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">
            {{ $teams->links() }}
        </div>
    </div>
</div>
