@extends('layouts/main')

@section('content')
    <p>Это содержимое тела страницы.</p>

    @if ( count($filialAll) )
        <table>
            @foreach ( $filialAll as $filialOne)
            <tr>
                <td> {{ $filialOne->getAttribute('Name') }} </td>
                <td><a  href="{{ URL::to('filial', array( 'id' => $filialOne->getId() ) ) }}"><button  class="btn btn-primary">Редактить</button></a></td>
            </tr>
            @endforeach
            <tr>
                <td><a  href="{{ URL::to('filial' , array( 'id' => 'new' ) ) }}"><button  class="btn btn-success">Новый</button></a></td>
                <td></td>
            </tr>
        </table>
    @else
        Нет записей
    @endif
@endsection



