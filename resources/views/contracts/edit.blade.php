<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Update Bonus Contract Employee') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
            <form action="{{ route('contracts.update', ['contract' =>
                $contract]) }}" enctype="multipart/form-data" method="post">

                @csrf
                @method('PUT')

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

                <label for="meses">
                {{ __('Meses') }}
                </label>
                <input type="number" name="meses" id="meses" value="{{ $contract->meses }}">
                @error('Meses')
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