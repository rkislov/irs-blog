@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1>Редактировать категорию</h1>

        </div>
        <form method="post">
            {!! csrf_field() !!}
            <p>Введите наименование категории:<br>
                <input type="text" name="title" class="form-control" value="{{$category->title}}" required></p>
            <p>Описание категории:<br>
                <textarea name="description" class="form-control">{!! $category->description !!}</textarea></p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Редактировать</button>
        </form>



    </main>
@endsection