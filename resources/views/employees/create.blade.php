<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Employee') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                
                <label for="ci">
                {{ __('CI') }}
                </label>
                <input type="text" name="ci" id="ci">
                @error('CI')
                <div>
                {{ $message }}
                </div>
                @enderror

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
                <input type="text" name="nomb" id="nomb">
                @error('Nombre')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="apell">
                {{ __('Apellido') }}
                </label>
                <input type="text" name="apell" id="apell">
                @error('Apellido')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="fechanac">
                {{ __('Fecha-Nacimiento') }}
                </label>
                <input type="date" name="fechanac" id="fechanac" >
                @error('Fecha-Nacimiento')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="tel">
                {{ __('Telefono') }}
                </label>
                <input type="number" name="tel" id="tel">
                @error('Telefono')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="temple">
                {{ __('Tipo-Empleado') }}
                </label>
                <select name="temple">
                    <option value="planta" selected>Planta</option>
                    <option value="contrato" >Contrato</option>
                </select>
                @error('Tipo-Empleado')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="post_id">
                {{ __('Post_Id') }}
                </label>
                <select name="post_id">
                @foreach($dates as $regi)
                    <option value="{{$regi->id}}" selected>{{$regi->nombre}}</option>
                @endforeach
                </select>

                <label for="dir">
                {{ __('Direccion') }}
                </label>
                <input type="text" name="dir" id="dir">
                @error('Direccion')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="tcontrato">
                {{ __('Tiempo-Contrato') }}
                </label>
                <input type="date" name="tcontrato" id="tcontrato">
                @error('Tiempo-Contrato')
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