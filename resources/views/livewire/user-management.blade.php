<div>
    {{-- * Filters Section --}}
    <section class="flex flex-col lg:flex-row justify-end sm:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
        <div class="flex-1">
            <input wire:model.live="search" type="text"
                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-lg shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300"
                name="search" placeholder="Buscar usuario..." />
        </div>
        <div class="flex items-center lg:justify-start sm:justify-between flex-col sm:flex-row space-y-4 sm:space-y-0 lg:mt-0 mt-2">
            <select wire:model.live="status" id="status" name="status"
                class="bg-blue-50 lg:ml-4 w-full sm:flex-1 sm:mr-4 lg:mr-0 sm:w-32 border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-md text-blue-700 text-sm rounded-lg py-2.5 px-5 transition duration-300 ease-in-out">
                <option value="">Estado</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <select wire:model.live="perPage"
                class="bg-blue-50 lg:ml-4 w-full mt-2 sm:mt-0 flex-1 sm:w-32 border-transparent shadow-md text-blue-700 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 py-2.5 px-5 transition duration-300 ease-in-out">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <button type="button" wire:click="openModal"
                class="bg-green-500 w-full sm:w-40 sm:ml-4 mt-2 sm:mt-0 shadow-md text-white font-semibold rounded-lg text-sm py-2.5 px-4 text-center inline-flex items-center transition duration-300 ease-in-out hover:bg-green-600">
                <span class="material-symbols-outlined mr-3">person_add</span>
                Crear Usuario
            </button>
        </div>
    </section>

    {{-- * Users Table --}}
    <div class="overflow-x-auto mt-10">
        <table class="min-w-full w-full bg-blue-800 text-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-blue-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"></th>
                    <th wire:click="sortBy('id')" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider cursor-pointer">
                        ID
                        @if ($sortField === 'id')
                            @if ($sortDirection === 'asc')
                                <span>&#9650;</span>
                            @else
                                <span>&#9660;</span>
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Rol</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Fecha de Registro</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Estado</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-600 bg-blue-700">
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr class="shadow-md">
                            <td class="px-4 py-4 whitespace-nowrap w-16">
                                @if ($user->profile_photo_url)
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                @else
                                    <span class="h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center text-white">
                                        {{ substr($user->name, 0, 1) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{ $user->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium">{{ $user->name }}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">
                                    @if ($user->roles)
                                        @if ($user->roles->count() > 0)
                                            {{ $user->roles->first()->name }}
                                        @else
                                            Sin Rol
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm">{{ $user->created_at->format('d/m/Y H:i:s') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center text-xs font-medium px-2.5 py-0.5 rounded-full {{ $user->status == '1' ? 'bg-green-400/20 text-green-500' : 'bg-red-400/20 text-red-500' }}">
                                    <span class="w-2 h-2 me-1 rounded-full {{ $user->status == '1' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    {{ $user->status == '1' ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                <button wire:click="assignTeam({{ $user->id }})"
                                    class="text-white material-symbols-outlined hover:text-emerald-500 transition duration-200 ease-in-out">
                                    edit
                                </button>
                                <button type="button" wire:click="$set('managingFiles', {{ $user->id }})"
                                    class="text-white material-symbols-outlined hover:text-emerald-500 transition duration-200 ease-in-out">
                                    description
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm text-white">No hay usuarios disponibles</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>

    {{-- * Create User Modal --}}
    @if($isModalOpen)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Crear Usuario
                                </h3>
                                <div class="mt-2">
                                    <form>
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                            <input type="text" wire:model="newUser.name" id="name"
                                                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-md shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300">
                                            @error('newUser.name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" wire:model="newUser.email" id="email"
                                                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-md shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300">
                                            @error('newUser.email')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                            <input type="password" wire:model="newUser.password" id="password"
                                                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-md shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300">
                                            @error('newUser.password')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                                            <select wire:model="newUser.role" id="role"
                                                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-md shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                <option value="">Selecciona un rol</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('newUser.role')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                                            <select wire:model="newUser.status" id="status"
                                                class="w-full bg-blue-50 text-blue-700 placeholder-blue-400 rounded-md shadow-md border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>
                                            @error('newUser.status')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="saveUser" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 sm:ml-3 sm:w-auto sm:text-sm">
                            Guardar
                        </button>
                        <button type="button" wire:click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
