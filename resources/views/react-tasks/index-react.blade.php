<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Piano Tiles -->
        <div class="bg-white overflow-hidden shadow-xl rounded-lg hover:scale-105 transition duration-200 ease-it-out">
            <a href="{{ route('music-task') }}" :active="request() - > routeIs('music-task')" class="block">
                <div class="p-4">
                    <p class="flex items-center text-blue-700">
                        <i class="fas fa-music mr-2"></i>
                        Piano Tiles
                    </p>
                </div>
            </a>
        </div>

        <!-- Simon Says -->
        <div class="bg-white overflow-hidden shadow-xl rounded-lg hover:scale-105 transition duration-200 ease-it-out">
            <a href="{{ route('simon-task') }}" :active="request() - > routeIs('simon-task')" class="block">
                <div class="p-4">
                    <p class="flex items-center text-blue-700">
                        <i class="fas fa-calculator mr-2"></i>
                        Simon Says
                    </p>
                </div>
            </a>
        </div>

        <!-- Drag And Drop -->
        <div class="bg-white overflow-hidden shadow-xl rounded-lg hover:scale-105 transition duration-200 ease-it-out">
            <a href="{{ route('drag-and-drop') }}" :active="request() - > routeIs('drag-and-drop')" class="block">
                <div class="p-4">
                    <p class="flex items-center text-blue-700">
                        <i class="fas fa-hand-rock mr-2"></i>
                        Drag And Drop
                    </p>
                </div>
            </a>
        </div>
    </div>
</x-app-layout>
