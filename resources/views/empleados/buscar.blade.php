<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Buscar Empleado') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('empleados.store') }}" method="get" enctype="multipart/form-data">
                @csrf

                <label for="ci">
                {{ __('Employee_Ci') }}
                </label>
                <select name="ci">
                @foreach($datos as $reg)
                    <option value="{{$reg->ci}}" selected>{{$reg->nomb}}</option>
                @endforeach
                </select>

                <button type="submit">
                {{ __('Search') }}
                </button>
                </form>
            
            </div>
            
        </div>
        
    </div>
</div>
</x-app-layout>