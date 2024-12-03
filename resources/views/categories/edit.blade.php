@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#2B2D42] to-[#1A1B2E] py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-xl border border-white/20">
                <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300 mb-6 flex items-center">
                    <i class="fas fa-tag text-[#6C63FF] mr-3"></i>
                    Editar Categoría
                </h2>

                <form method="POST" action="{{ route('categories.update', $category) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-white/80 text-sm font-medium mb-2">Nombre de la Categoría</label>
                        <div class="relative">
                            <input type="text" 
                                   class="w-full bg-white/10 border border-white/20 rounded-lg pl-10 pr-4 py-2.5 text-white placeholder-gray-400 focus:border-[#6C63FF] focus:ring focus:ring-[#6C63FF]/20 transition-all @error('name') border-red-500/50 @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $category->name) }}" 
                                   placeholder="Ingresa el nombre de la categoría"
                                   required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-[#6C63FF]/50"></i>
                            </div>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4 mt-8">
                        <a href="{{ route('categories.index') }}" 
                           class="px-6 py-2.5 border border-white/20 rounded-lg text-white hover:bg-white/5 transition-colors flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 bg-[#6C63FF] hover:bg-[#5952cc] text-white rounded-lg transition-colors flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Actualizar Categoría
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
    input {
        transition: all 0.3s ease;
    }

    input:focus {
        transform: translateY(-1px);
    }

    /* Animaciones para los botones */
    button, a {
        transition: all 0.3s ease;
    }

    button:hover, a:hover {
        transform: translateY(-1px);
    }

    /* Animación para los iconos */
    .fas {
        transition: transform 0.3s ease;
    }

    button:hover .fas, a:hover .fas {
        transform: scale(1.1);
    }

    /* Efecto de brillo en hover para el input */
    input:hover {
        box-shadow: 0 0 0 1px rgba(108, 99, 255, 0.1);
    }
</style>
@endpush
@endsection
