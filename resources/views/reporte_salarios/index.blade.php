<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('REPORTEs DE EMPLEADOS Y CARGOS') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <table>
                <thead>
                <tr>
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Apellido') }}</th>
                <th>{{ __('Tipo-Empleado') }}</th>
                <th>{{ __('Cargo') }}</th>
                <th>{{ __('Descripcion') }}</th>
                <th>{{ __('Salario') }}</th>
                <th>{{ __('Horario') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($employees as $employee)
                <tr>
                <td>{{ $employee->nomb }}</td>
                <td>{{ $employee->apell }}</td>
                <td>{{ $employee->temple }}</td>
                <td>{{ $employee->nombre }}</td>
                <td>{{ $employee->descrip }}</td>
                <td>{{ $employee->salario }}</td>
                <td>{{ $employee->horario }}</td>
                <td>
                </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                </tr>
                </tbody>
                </table>
    </div>
</div>
</x-app-layout>