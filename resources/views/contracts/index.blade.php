<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('AGUINALDOS-EMPLEADOS-CONTRATO') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $contracts->count())

                

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Employee-ci') }}</th>
                <th>{{ __('Tipo-Empleado') }}</th>
                <th>{{ __('Meses') }}</th>
                <th>{{ __('Salario') }}</th>
                <th>{{ __('Total') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($contracts as $contract)
                <tr>
                <td>{{ $contract->id }}</td>
                <td>{{ $contract->employee_ci }}</td>
                <td>{{ $contract->templeado }}</td>
                <td>{{ $contract->meses }}</td>
                <td>{{ $contract->salario }}</td>
                <td>{{ $contract->total }}</td>
                <td>
                </td>
                
                <td>
                <form action="{{ route('contracts.destroy', ['contract' =>
                $contract]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">
                {{ __('Delete') }}
                </button>
                </form>
                </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                <td>
                <a href="{{ route('contracts.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $contracts->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>