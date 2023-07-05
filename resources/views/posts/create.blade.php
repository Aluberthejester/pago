<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Post') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <label for="nombre">
                {{ __('Nombre') }}
                </label>
                <input type="text" name="nombre" id="nombre">
                @error('nombre')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="descrip">
                {{ __('Descrip') }}
                </label>
                <input type="text" name="descrip" id="descrip">
                @error('descrip')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="salario">
                {{ __('Salario') }}
                </label>
                <input type="text" name="salario" id="salario" >
                
                @error('salario')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="horario">
                {{ __('Horario') }}
                </label>
                <input type="text" name="horario" id="horario">
                @error('horario')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Register') }}
                </button>
                </form>
            
            </div>
            
        </div>
        
    </div>
</div>
</x-app-layout>