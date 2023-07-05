<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('AGUINALDOS-EMPLEADOS-PLANTA') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $bonuses->count())

                

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Employee-ci') }}</th>
                <th>{{ __('Tipo-Empleado') }}</th>
                <th>{{ __('Meses') }}</th>
                <th>{{ __('Boleta 1') }}</th>
                <th>{{ __('Boleta 2') }}</th>
                <th>{{ __('Boleta 3') }}</th>
                <th>{{ __('Salario') }}</th>
                <th>{{ __('Total') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($bonuses as $bonus)
                <tr>
                <td>{{ $bonus->id }}</td>
                <td>{{ $bonus->employee_ci }}</td>
                <td>{{ $bonus->templeado }}</td>
                <td>{{ $bonus->meses }}</td>
                <td>{{ $bonus->bol1 }}</td>
                <td>{{ $bonus->bol2 }}</td>
                <td>{{ $bonus->bol3 }}</td>
                <td>{{ $bonus->salario }}</td>
                <td>{{ $bonus->total }}</td>
                <td>
                </td>
                
                <td>
                <form action="{{ route('bonuses.destroy', ['bonus' =>
                $bonus]) }}" method="post">
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
                <a href="{{ route('bonuses.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $bonuses->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>