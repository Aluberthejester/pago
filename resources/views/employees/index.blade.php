<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Employees') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $employees->count())

                

                <table>
                <thead>
                <tr>
                <th>CI</th>
                <th>{{ __('User-Id') }}</th>
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Apellido') }}</th>
                <th>{{ __('Fecha-Nacimiento') }}</th>
                <th>{{ __('Telefono') }}</th>
                <th>{{ __('Tipo-Empleado') }}</th>
                <th>{{ __('Post-Id') }}</th>
                <th>{{ __('Direccion') }}</th>
                <th>{{ __('Tiempo-Contrato') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($employees as $employee)
                <tr>
                <td>{{ $employee->ci }}</td>
                <td>{{ $employee->user_id }}</td>
                <td>{{ $employee->nomb }}</td>
                <td>{{ $employee->apell }}</td>
                <td>{{ $employee->fechanac }}</td>
                <td>{{ $employee->tel }}</td>
                <td>{{ $employee->temple }}</td>
                <td>{{ $employee->post_id }}</td>
                <td>{{ $employee->dir }}</td>
                <td>{{ $employee->tcontrato }}</td>
                <td>
                </td>
                <td>
                <a href="{{ route('employees.edit', ['employee' => $employee])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('employees.destroy', ['employee' =>
                $employee]) }}" method="post">
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
                <a href="{{ route('employees.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $employees->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>