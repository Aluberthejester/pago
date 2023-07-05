<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Employee') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
            <form action="{{ route('employees.update', ['employee' =>
                $employee]) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('PUT')

                <label for="user_id">
                {{ __('User_Id') }}
                </label>
                <select name="user_id">
                @foreach($datos as $reg)
                    <option value="{{$reg->id}}" selected>{{$reg->name}}</option>
                @endforeach
                </select>

                <label for="nomb">
                {{ __('Nombre') }}
                </label>
                <input type="text" name="nomb" id="nomb" value="{{ $employee->nomb }}">
                @error('Nombre')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="apell">
                {{ __('Apellido') }}
                </label>
                <input type="text" name="apell" id="apell" value="{{ $employee->apell }}">
                @error('Apellido')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="fechanac">
                {{ __('Fecha-Nacimiento') }}
                </label>
                <input type="date" name="fechanac" id="fechanac" value="{{ $employee->fechanac }}">
                @error('Fecha-Nacimiento')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="tel">
                {{ __('Telefono') }}
                </label>
                <input type="number" name="tel" id="tel" value="{{ $employee->tel }}">
                @error('Telefono')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="temple">
                {{ __('Tipo-Empleado') }}
                </label>
                <input type="hidden" name="temple" id="temple" value="{{ $employee->temple }}">
                @error('Tipo-Empleado')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="post_id">
                {{ __('post_id') }}
                </label>
                <input type="number" name="post_id" id="post_id" value="{{ $employee->post_id }}">
                @error('post_id')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="dir">
                {{ __('Direccion') }}
                </label>
                <input type="text" name="dir" id="dir" value="{{ $employee->dir }}">
                @error('Direccion')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="tcontrato">
                {{ __('Tiempo-Contrato') }}
                </label>
                <input type="hidden" name="tcontrato" id="tcontrato" value="{{ $employee->tcontrato }}">
                @error('Tiempo-Contrato')
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