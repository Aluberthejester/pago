<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('TICKETS') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $tickets->count())

                

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Employee-Ci') }}</th>
                <th>{{ __('Mes-Año') }}</th>
                <th>{{ __('Fecha') }}</th>
                <th>{{ __('Salario') }}</th>
                <th>{{ __('Aguinaldo') }}</th>
                <th>{{ __('Descuentos') }}</th>
                <th>{{ __('Bonos') }}</th>
                <th>{{ __('Salario-Neto') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->employee_ci }}</td>
                <td>{{ $ticket->mes_año }}</td>
                <td>{{ $ticket->fecha }}</td>
                <td>{{ $ticket->salario }}</td>
                <td>{{ $ticket->aguinaldo }}</td>
                <td>{{ $ticket->desc }}</td>
                <td>{{ $ticket->bonos }}</td>
                <td>{{ $ticket->nombre }}</td>
                <td>
                </td>
                <td>
                <a href="{{ route('tickets.edit', ['ticket' => $ticket])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('tickets.destroy', ['ticket' =>
                $ticket]) }}" method="post">
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
                <a href="{{ route('tickets.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $tickets->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>