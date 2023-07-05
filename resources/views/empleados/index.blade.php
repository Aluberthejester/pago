<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('REPORTE DE BOLETA') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <table>
                <thead>
                <tr>
                <th>{{ __('CI') }}</th>
                <th>{{ __('NOMBRE') }}</th>
                <th>{{ __('APELLIDO') }}</th>
                <th>{{ __('FECHA NACIMIENTO') }}</th>
                <th>{{ __('DIRECCION') }}</th>
                <th>{{ __('TIPO EMPLEADO') }}</th>
                <th>{{ __('MES-AÑO') }}</th>
                <th>{{ __('SALARIO') }}</th>
                <th>{{ __('AGUINALDO') }}</th>
                <th>{{ __('DESCUENTOS') }}</th>
                <th>{{ __('BONOS') }}</th>
                
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->ci }}</td>
            <td>{{ $empleado->nomb }}</td>
            <td>{{ $empleado->apell }}</td>
            <td>{{ $empleado->fechanac }}</td>
            <td>{{ $empleado->dir }}</td>
            <td>{{ $empleado->temple }}</td>
            <td>{{ $empleado->mes_año }}</td>
            <td>{{ $empleado->salario }}</td>
            <td>{{ $empleado->aguinaldo }}</td>
            <td>{{ $empleado->desc }}</td>
            <td>{{ $empleado->bonos }}</td>
        </tr>
        @endforeach
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                </tr>
                </tbody>
                </table>
    
            </div>
        </div>
        <a href="{{ url('/empleados/download') }}">Descargar PDF</a>

    </div>
</div>
</x-app-layout>