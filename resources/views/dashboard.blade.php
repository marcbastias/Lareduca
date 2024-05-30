<x-app-layout>
    <!-- Sección de Encabezado -->
    <div class="bg-blue-50 p-8 rounded-xl shadow-2xl mb-8">
        <header class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-blue-800 dark:text-blue-300 leading-tight">
                {{ __('Tablero de Control') }}
            </h2>
            <div class="text-lg text-blue-700">
                {{ __('¡Bienvenido de nuevo,') }} {{ Auth::user()->name }}!
            </div>
        </header>
    </div>

    <!-- Sección de Contenido Principal -->
    <div class="bg-blue-50 text-blue-900 p-8 rounded-xl shadow-2xl mb-8">
        <!-- Encabezado de Cursos -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="ml-3 text-2xl font-extrabold">{{ __('Cursos') }}</h2>
            
        </div>

        <!-- Lista de Cursos -->
        <div class="space-y-6">
            @foreach(['M9 - Diseño de Interfaces Web', 'M6 - Web en Entorno Cliente', 'M12 - Proyecto', 'M3 - JavaScript'] as $course)
                <div class="bg-blue-100 text-blue-900 p-6 rounded-xl shadow-md">
                    <p class="font-semibold">{{ __($course) }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sección de Progreso y Notificaciones -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <!-- Tarjeta de Progreso -->
        <div class="bg-blue-50 p-8 rounded-xl shadow-2xl">
            <h3 class="text-xl font-bold mb-4">{{ __('Tu Progreso') }}</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-semibold">{{ __('M9 - Diseño de Interfaces Web') }}</h4>
                    <div class="bg-blue-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full" style="width: 75%;"></div>
                    </div>
                    <p class="text-sm text-blue-700 mt-1">{{ __('75% Completado') }}</p>
                </div>
                <div>
                    <h4 class="font-semibold">{{ __('M6 - Web en Entorno Cliente') }}</h4>
                    <div class="bg-blue-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full" style="width: 50%;"></div>
                    </div>
                    <p class="text-sm text-blue-700 mt-1">{{ __('50% Completado') }}</p>
                </div>
                <!-- Añadir más barras de progreso según sea necesario -->
            </div>
        </div>

        <!-- Tarjeta de Notificaciones -->
        <div class="bg-blue-50 p-8 rounded-xl shadow-2xl">
            <h3 class="text-xl font-bold mb-4">{{ __('Notificaciones') }}</h3>
            <div class="space-y-4">
                <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                    <p class="font-semibold">{{ __('Nuevo curso disponible: M5 - CSS Avanzado') }}</p>
                    <p class="text-sm text-blue-700">{{ __('Consulta el nuevo curso sobre técnicas avanzadas de CSS.') }}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                    <p class="font-semibold">{{ __('Recordatorio: Plazo del proyecto próximo') }}</p>
                    <p class="text-sm text-blue-700">{{ __('Tu entrega del proyecto vence en 3 días.') }}</p>
                </div>
                <!-- Añadir más notificaciones según sea necesario -->
            </div>
        </div>
    </div>

    <!-- Sección de Recursos Adicionales -->
    <div class="bg-blue-50 text-blue-900 p-8 rounded-xl shadow-2xl">
        <h3 class="text-xl font-bold mb-4">{{ __('Recursos Adicionales') }}</h3>
        <div class="space-y-4">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <h4 class="font-semibold">{{ __('Recurso 1: Fundamentos de HTML y CSS') }}</h4>
                <p class="text-blue-700">{{ __('Una guía completa para entender los fundamentos de HTML y CSS.') }}</p>
                <a href="#" class="text-blue-600 hover:underline">{{ __('Leer Más') }}</a>
            </div>
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <h4 class="font-semibold">{{ __('Recurso 2: Fundamentos de JavaScript') }}</h4>
                <p class="text-blue-700">{{ __('Aprende los conceptos básicos de la programación en JavaScript.') }}</p>
                <a href="#" class="text-blue-600 hover:underline">{{ __('Leer Más') }}</a>
            </div>
            <!-- Añadir más recursos según sea necesario -->
        </div>
    </div>
</x-app-layout>
