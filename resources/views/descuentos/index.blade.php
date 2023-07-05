<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('REPORTE_SALARIOS') }}
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
                <th>{{ __('Descripcion') }}</th>
                <th>{{ __('Horario') }}</th>
                <th>{{ __('Cargo') }}</th>
                <th>{{ __('desc_jubi') }}</th>
                <th>{{ __('desc_fns') }}</th>
                <th>{{ __('desc_fpc') }}</th>
                <th>{{ __('Descueento Total') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($discounts as $discount)
                <tr>
                <td>{{ $discount->post->nombre }}</td>
                <td>{{ $discount->post->descrip }}</td>
                <td>{{ $discount->post->horario }}</td>
                <td>{{ $discount->post->salario }}</td>
                <td>{{ $discount->desc_jubi }}</td>
                <td>{{ $discount->desc_fns }}</td>
                <td>{{ $discount->desc_fpc }}</td>
                <td>{{ $discount->neto }}</td>
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
        <a href="{{ url('/descuentos/download') }}">Descargar PDF</a>

    </div>
</div>
</x-app-layout>