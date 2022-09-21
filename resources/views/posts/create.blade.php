@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-4/12 p-5">
            <form method="POST" action="{{ route('imagenes.store') }}" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" enctype="multipart/form-data">
                @csrf
            </form>
        </div>
        <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('posts.store') }}" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppcase text-gray-500 font-bold">Título</label>
                    <input
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Título de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message; }}</p>                        
                    @enderror
                </div>   

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppcase text-gray-500 font-bold">Descripción</label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message; }}</p>                        
                    @enderror
                </div>   
                <div class="mb-5">
                    <input
                        id="imagen"
                        name="imagen"
                        type="hidden"
                        value="{{ old('imagen') }}"
                    />
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message; }}</p>                        
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>        
    </div>
@endsection