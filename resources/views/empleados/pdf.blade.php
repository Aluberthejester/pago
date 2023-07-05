<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Salarios (PDF)</title>
</head>
<body>
    <h1>Reporte de Salarios</h1>

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
</body>
</html>
