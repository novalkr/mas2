@extends('layouts/main')

@section('content')
    <p>Это содержимое тела страницы.</p>

    @if ( count($uslugaAll) )
        <table>
            @foreach ( $uslugaAll as $uslugaOne)
            <tr>
                <td> {{ $uslugaOne->getAttribute('Name') }} </td>
                <td><a  href="/usluga/{{ $uslugaOne->getId() }}"><button  class="btn btn-primary">Редактить</button></a></td>
            </tr>
            @endforeach
        </table>
    @else
        Нет записей
    @endif
@endsection



