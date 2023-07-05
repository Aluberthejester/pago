<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create-Bonus-Employee-Contract') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <form action="{{ route('contracts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="employee_ci">
                {{ __('Employee_Id') }}
                </label>
                <select name="employee_ci">
                @foreach($datos as $reg)
                    <option value="{{$reg->ci}}" selected>{{$reg->nomb}}</option>
                @endforeach
                </select>

                <label for="templeado">
                {{ __('Tipo-Empleado') }}
                </label>
                <select name="templeado">
                    <option value="contrato" selected>Contrato</option>
                </select>
                @error('Tipo-Empleado')
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