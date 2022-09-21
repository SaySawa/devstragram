@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }} 
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" novalidate class="mt-10 md:mt-0">
                @csrf  
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppcase text-gray-500 font-bold">UserName</label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}"
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message; }}</p>                        
                    @enderror
                </div>   

                <div class="mb-5">
                    <input
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png, .gif"
                    />
                </div>
                <input
                    type="submit"
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                /> 
            </form>      
        </div>
    </div>
@endsection