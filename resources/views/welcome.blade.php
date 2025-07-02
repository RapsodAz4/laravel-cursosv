<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Gestión de Proyectos - El Salvador</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 text-gray-900 dark:text-white min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <header class="text-center mb-12">
                <div class="flex justify-center mb-6">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-4 rounded-full shadow-lg">
                        <i class="fas fa-landmark text-4xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Gobierno de El Salvador
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Sistema de Gestión de Proyectos
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Plataforma integral para la administración y seguimiento de proyectos gubernamentales
                </p>
            </header>

            <!-- Main Content -->
            <main class="max-w-6xl mx-auto">
                <!-- Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-center mb-4">
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full inline-block">
                                <i class="fas fa-project-diagram text-2xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Gestión de Proyectos</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center">
                            Administra y da seguimiento a todos los proyectos gubernamentales de manera eficiente
                        </p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-center mb-4">
                            <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full inline-block">
                                <i class="fas fa-chart-line text-2xl text-green-600 dark:text-green-400"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Seguimiento Financiero</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center">
                            Controla montos planificados, patrocinados y fondos propios de cada proyecto
                        </p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-center mb-4">
                            <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full inline-block">
                                <i class="fas fa-file-pdf text-2xl text-purple-600 dark:text-purple-400"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-center mb-3">Reportes PDF</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center">
                            Genera informes detallados en formato PDF para presentaciones oficiales
                        </p>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="text-center bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold mb-4">¿Listo para comenzar?</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-2xl mx-auto">
                        Accede al sistema de gestión de proyectos y comienza a administrar los proyectos gubernamentales de El Salvador
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('proyectos.index') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-rocket mr-2"></i>
                            Acceder al Sistema
                        </a>
                        <a href="{{ route('proyectos.create') }}" 
                           class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-plus mr-2"></i>
                            Crear Proyecto
                        </a>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid md:grid-cols-4 gap-6 mt-12">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg text-center">
                        <i class="fas fa-folder-open text-3xl text-blue-500 mb-3"></i>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white">{{ App\Models\Proyecto::count() }}</h4>
                        <p class="text-gray-600 dark:text-gray-400">Proyectos Activos</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg text-center">
                        <i class="fas fa-dollar-sign text-3xl text-green-500 mb-3"></i>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format(App\Models\Proyecto::sum('MontoPlanificado'), 2) }}</h4>
                        <p class="text-gray-600 dark:text-gray-400">Total Planificado</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg text-center">
                        <i class="fas fa-handshake text-3xl text-purple-500 mb-3"></i>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format(App\Models\Proyecto::sum('MontoPatrocinado'), 2) }}</h4>
                        <p class="text-gray-600 dark:text-gray-400">Total Patrocinado</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg text-center">
                        <i class="fas fa-piggy-bank text-3xl text-orange-500 mb-3"></i>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format(App\Models\Proyecto::sum('MontoFondosPropios'), 2) }}</h4>
                        <p class="text-gray-600 dark:text-gray-400">Fondos Propios</p>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="text-center mt-16 pt-8 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-600 dark:text-gray-400">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Sistema Seguro - Gobierno de El Salvador
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">
                    © {{ date('Y') }} República de El Salvador. Todos los derechos reservados.
                </p>
            </footer>
        </div>

        <style>
            .bg-gradient-to-br {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
            
            @media (prefers-color-scheme: dark) {
                .bg-gradient-to-br {
                    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                }
            }
        </style>
    </body>
</html>
