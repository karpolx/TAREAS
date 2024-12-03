@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <!-- Card Principal -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-white/20">
                <!-- Encabezado -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300 flex items-center">
                        <i class="fas fa-edit text-[#6C63FF] mr-3"></i>
                        Editar Tarea
                    </h2>
                    <p class="mt-2 text-white/60">Actualiza los detalles de tu tarea</p>
                </div>

                <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Campo Título -->
                    <div class="space-y-2">
                        <label for="title" class="block text-white/80 text-sm font-medium">Título</label>
                        <div class="relative group">
                            <input type="text" 
                                   class="w-full bg-white/10 border border-white/20 rounded-lg pl-10 pr-4 py-3 text-white placeholder-gray-400 focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all @error('title') border-red-500/50 @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $task->title) }}" 
                                   placeholder="Ingresa el título de la tarea"
                                   required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-heading text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                        </div>
                        @error('title')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="space-y-2">
                        <label for="description" class="block text-white/80 text-sm font-medium">Descripción</label>
                        <div class="relative group">
                            <textarea 
                                class="w-full bg-white/10 border border-white/20 rounded-lg pl-10 pr-4 py-3 text-white placeholder-gray-400 focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all min-h-[120px] @error('description') border-red-500/50 @enderror" 
                                id="description" 
                                name="description" 
                                placeholder="Describe los detalles de la tarea"
                                rows="4">{{ old('description', $task->description) }}</textarea>
                            <div class="absolute top-3 left-0 pl-3 pointer-events-none">
                                <i class="fas fa-align-left text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                        </div>
                        @error('description')
                            <p class="text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Campo Status -->
                    <div class="space-y-2">
                        <label class="block text-white/80 text-sm font-medium">Estado</label>
                        <div class="relative group">
                            <select name="status" 
                                    class="w-full bg-white/10 border border-white/20 rounded-lg pl-10 pr-4 py-3 text-white appearance-none focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all cursor-pointer">
                                <option value="pendiente" {{ old('status', $task->status) == 'pendiente' ? 'selected' : '' }} class="bg-[#2B2D42]">Pendiente</option>
                                <option value="en_progreso" {{ old('status', $task->status) == 'en_progreso' ? 'selected' : '' }} class="bg-[#2B2D42]">En Progreso</option>
                                <option value="completada" {{ old('status', $task->status) == 'completada' ? 'selected' : '' }} class="bg-[#2B2D42]">Completada</option>
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tasks text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Campo Categoría -->
                    <div class="space-y-2">
                        <label class="block text-white/80 text-sm font-medium">Categoría</label>
                        <div class="relative group">
                            <select name="category_id" 
                                    class="w-full bg-white/10 border border-white/20 rounded-lg pl-10 pr-4 py-3 text-white appearance-none focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all cursor-pointer">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}
                                            class="bg-[#2B2D42]">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-[#6C63FF]/50 group-hover:text-[#6C63FF] transition-colors"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex justify-end space-x-4 mt-8 pt-4 border-t border-white/10">
                        <a href="{{ route('tasks.index') }}" 
                           class="px-6 py-2.5 border border-white/20 rounded-lg text-white hover:bg-white/5 transition-colors flex items-center group">
                            <i class="fas fa-arrow-left mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform"></i>
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 bg-[#6C63FF] hover:bg-[#5952cc] text-white rounded-lg transition-colors flex items-center group">
                            <i class="fas fa-save mr-2 group-hover:scale-110 transition-transform"></i>
                            Actualizar Tarea
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Estilizado del input date para navegadores webkit */
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        opacity: 0.5;
        cursor: pointer;
    }

    /* Animaciones para los inputs y textareas */
    input, textarea, select {
        transition: all 0.3s ease;
    }

    input:focus, textarea:focus, select:focus {
        transform: translateY(-1px);
    }

    /* Animaciones para los botones */
    button, a {
        transition: all 0.3s ease;
    }

    button:hover, a:hover {
        transform: translateY(-1px);
    }

    /* Personalización del scrollbar para textarea */
    textarea::-webkit-scrollbar {
        width: 8px;
    }

    textarea::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    textarea::-webkit-scrollbar-thumb {
        background: rgba(108, 99, 255, 0.5);
        border-radius: 4px;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        background: rgba(108, 99, 255, 0.7);
    }

    /* Efecto de brillo en hover para inputs */
    input:hover, textarea:hover, select:hover {
        box-shadow: 0 0 0 1px rgba(108, 99, 255, 0.1);
    }

    /* Animaciones de grupo */
    .group:hover .group-hover\:text-[#6C63FF] {
        color: #6C63FF;
    }
</style>
@endpush
@endsection
