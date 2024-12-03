@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300">
                        Lista de Categorías
                    </h2>
                    <a href="{{ route('categories.create') }}" 
                       class="px-4 py-2 bg-[#6C63FF] hover:bg-[#5952cc] text-white rounded-lg transition-all duration-300 flex items-center space-x-2">
                        <i class="fas fa-plus text-sm"></i>
                        <span>Nueva Categoría</span>
                    </a>
                </div>

                <!-- Alerts -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-lg backdrop-blur-sm">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <p class="text-emerald-400">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-500/10 border border-red-500/20 rounded-lg backdrop-blur-sm">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-exclamation-circle text-red-400"></i>
                            <p class="text-red-400">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white/60 uppercase tracking-wider">
                                    Tareas
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-white/60 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach ($categories as $category)
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-tag text-[#6C63FF]"></i>
                                            <span class="text-white">{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs rounded-full bg-[#6C63FF]/20 text-[#6C63FF] border border-[#6C63FF]/30">
                                            {{ $category->tasks_count }} tareas
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('categories.edit', $category) }}" 
                                           class="inline-flex items-center px-3 py-1.5 border border-white/20 rounded-lg text-white hover:bg-white/5 transition-colors">
                                            <i class="fas fa-edit mr-2"></i>
                                            Editar
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" 
                                              method="POST" 
                                              class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 border border-red-500/20 rounded-lg text-red-400 hover:bg-red-500/10 transition-colors"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">
                                                <i class="fas fa-trash-alt mr-2"></i>
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
</div>

@push('styles')
<style>
    /* Animaciones para los botones */
    a, button {
        transition: all 0.3s ease;
    }

    a:hover, button:hover {
        transform: translateY(-1px);
    }

    /* Efecto hover para las filas de la tabla */
    tr {
        transition: all 0.3s ease;
    }

    /* Animación para los iconos */
    .fas {
        transition: transform 0.3s ease;
    }

    a:hover .fas, button:hover .fas {
        transform: scale(1.1);
    }
</style>
@endpush
@endsection
