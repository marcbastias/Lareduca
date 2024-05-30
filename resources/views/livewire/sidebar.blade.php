<div id="sidebar" class="bg-white-light text-white hidden lg:block shadow-lg w-64">
    <div class="py-6 px-4 bg-white flex items-center justify-center">
        <img src="/logo.png" alt="Logo" class="h-10 w-10 mr-2">
    </div>
    <nav class="flex flex-col flex-grow">
        <a href="{{ route('dashboard') }}" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="fas fa-tachometer-alt text-xl mr-2"></i>
            <span>Panel</span>
        </a>
        <a href="{{ route('courses') }}" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="fas fa-book text-xl mr-2"></i>
            <span>Cursos</span>
        </a>
        <a href="{{ route('user-management') }}" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="fas fa-users-cog text-xl mr-2"></i>
            <span>Administración</span>
        </a>
        <a href="{{ route('tasks') }}" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="far fa-clipboard text-xl mr-2"></i>
            <span>Tareas</span>
        </a>
        <a href="{{ route('games') }}" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="fas fa-gamepad text-xl mr-2"></i>
            <span>Juegos</span>
        </a>
    </nav>
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="text-lg sidebar-field w-full text-left text-white flex items-center py-3 px-4 hover:bg-gray-700">
            <i class="fas fa-sign-out-alt text-xl mr-2"></i>
            <span>Cerrar Sesión</span>
        </button>
    </form>
</div>
