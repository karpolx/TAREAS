@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] py-8">
    <div class="container mx-auto px-4">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-white bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                    Lista de Tareas
                </h1>
                <a href="{{ route('tasks.create') }}" 
                   class="bg-[#6C63FF] hover:bg-[#5952cc] text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    Nueva Tarea
                </a>
            </div>

            @if (session('success'))
                <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-100 px-4 py-3 rounded-lg mb-6 backdrop-blur-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/10">
                            <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @foreach ($tasks as $task)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 text-sm text-white">
                                    {{ $task->title }}
                                </td>
                                <td class="px-6 py-4 text-sm text-white/80">
                                    {{ Str::limit($task->description, 50) }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full bg-[#6C63FF]/20 text-[#6C63FF] border border-[#6C63FF]/30">
                                        {{ $task->category->name }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($task->completed)
                                        <span class="px-3 py-1 text-xs rounded-full bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                            Completada
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-amber-500/20 text-amber-400 border border-amber-500/30">
                                            Pendiente
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-2">
                                    <a href="{{ route('tasks.edit', $task) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-blue-500/20 text-blue-400 border border-blue-500/30 rounded-lg hover:bg-blue-500/30 transition-colors">
                                        <i class="fas fa-edit mr-1"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" 
                                          method="POST" 
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-400 border border-red-500/30 rounded-lg hover:bg-red-500/30 transition-colors"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Estilos adicionales para mejorar la apariencia */
    .container {
        max-width: 1200px;
    }
    
    /* Animación para los botones */
    .btn-hover-effect {
        transition: all 0.3s ease;
    }
    .btn-hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 99, 255, 0.4);
    }
    
    /* Estilo para el scroll de la tabla */
    .overflow-x-auto {
        scrollbar-width: thin;
        scrollbar-color: rgba(108, 99, 255, 0.5) rgba(255, 255, 255, 0.1);
    }
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }
    .overflow-x-auto::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 3px;
    }
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: rgba(108, 99, 255, 0.5);
        border-radius: 3px;
    }
</style>
@endpush
