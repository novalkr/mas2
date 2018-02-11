@extends('layouts/main')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if ( old('flash') )
  <div class="alert alert-success">
    <ul>
        <li>{{  old('flash') }}</li>
    </ul>
  </div>
@endif


@section('content')
    <p>Это содержимое тела страницы.</p>
    @if ( !empty($uslugaOne) )
        <form method="post" action="/usluga/{{ $uslugaOne->getId() }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>наименование</td>
                    <td>
                        <input name="Name" value="{{ $uslugaOne->getAttribute( 'Name' ) }}" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-danger">Сохранить</button>
                    </td>
                    <td style=" text-align: right;">
                        <div class="btn btn-primary" onclick="location = document.referrer;"  >Назад</div>
                    </td>
                </tr>
            </table>
         </form>
    @else
        Нет записей
    @endif
@endsection
