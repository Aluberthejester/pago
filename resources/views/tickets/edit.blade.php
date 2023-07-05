<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('EDITAR DATOS DE LA BOLETA BONO') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
            <form action="{{ route('tickets.update', ['ticket' =>
                $ticket]) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('PUT')

                <label for="employee_ci">
                {{ __('Employee-Ci') }}
                </label>
                <select name="employee_ci">
                @foreach($datos as $reg)
                    <option value="{{$reg->ci}}" selected>{{$reg->nomb}}</option>
                @endforeach
                </select>

                <label for="mes_año">
                {{ __('Mes-Año') }}
                </label>
                <input type="text" name="mes_año" id="mes_año" value="{{ $ticket->mes_año }}">
                @error('Mes-Año')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="fecha">
                {{ __('Fecha') }}
                </label>
                <input type="date" name="fecha" id="fecha" value="{{ $ticket->fecha }}">
                @error('Fecha')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="nombre">
                {{ __('Nombre') }}
                </label>
                <input type="hidden" name="nombre" id="nombre" value="100">
                @error('Nombre')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Update') }}
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>