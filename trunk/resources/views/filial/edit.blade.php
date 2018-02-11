@extends('layouts/main')




@section('content')
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

    <p>Редактирование филиала.</p>
    @if ( !empty($filialOne) )
        <form method="post" action="{{ URL::to('filial', array( 'id' => $filialOne->getId()) ) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>Наименование</td>
                    <td>
                        <input name="Name" value="{{ $filialOne->getAttribute( 'Name' ) }}" >
                    </td>
                </tr>
                <tr>
                    <td>Адрес</td>
                    <td>
                        <input name="Adress" value="{{ $filialOne->getAttribute( 'Adress' ) }}" >
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
