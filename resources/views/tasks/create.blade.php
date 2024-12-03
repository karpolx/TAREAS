@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20">
                <h2 class="text-2xl font-bold text-white bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent mb-6">
                    Nueva Tarea
                </h2>

                <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-white/80 text-sm font-medium mb-2">Título</label>
                        <input type="text" 
                               class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all @error('title') border-red-500/50 @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               placeholder="Ingresa el título de la tarea"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-white/80 text-sm font-medium mb-2">Descripción</label>
                        <textarea class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2.5 text-white placeholder-gray-400 focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all @error('description') border-red-500/50 @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4"
                                  placeholder="Describe la tarea"
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-white/80 text-sm font-medium mb-2">Categoría</label>
                        <select class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2.5 text-white focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all @error('category_id') border-red-500/50 @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            <option value="" class="bg-[#2B2D42]">Selecciona una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        class="bg-[#2B2D42]"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4 mt-8">
                        <a href="{{ route('tasks.index') }}" 
                           class="px-6 py-2.5 border border-white/20 rounded-lg text-white hover:bg-white/5 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 bg-[#6C63FF] hover:bg-[#5952cc] text-white rounded-lg transition-colors">
                            Crear Tarea
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Animaciones para los inputs */
    input, textarea, select {
        transition: all 0.3s ease;
    }

    input:focus, textarea:focus, select:focus {
        transform: translateY(-1px);
    }

    /* Estilo para el scrollbar del textarea */
    textarea {
        scrollbar-width: thin;
        scrollbar-color: rgba(108, 99, 255, 0.5) rgba(255, 255, 255, 0.1);
    }

    textarea::-webkit-scrollbar {
        width: 6px;
    }

    textarea::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 3px;
    }

    textarea::-webkit-scrollbar-thumb {
        background: rgba(108, 99, 255, 0.5);
        border-radius: 3px;
    }
</style>
@endpush
@endsection
