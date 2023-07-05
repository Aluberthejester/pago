<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @if( $posts->count())

                

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Nombre') }}</th>
                <th>{{ __('Descripc') }}</th>
                <th>{{ __('Salario') }}</th>
                <th>{{ __('Horario') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($posts as $post)
                <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->nombre }}</td>
                <td>{{ $post->descrip }}</td>
                <td>{{ $post->salario }}</td>
                <td>{{ $post->horario }}</td>
                <td>
                </td>
                <td>
                <a href="{{ route('posts.edit', ['post' => $post])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('posts.destroy', ['post' =>
                $post]) }}" method="post">
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
                <a href="{{ route('posts.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</div>
<script>
    //window.onload = function() {
    //    window.location.href = '{{ url("/descuentos/index/pdf") }}';
    //}
</script>
</x-app-layout>