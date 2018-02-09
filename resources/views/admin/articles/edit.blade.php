@extends('layouts.admin')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1>Редактировать статью</h1>

        </div>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор категории (ий):<br>
                <select type="text" name="categories[]" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select></p>
            <p>Введите название статьи:<br>
                <input type="text" name="title" value="{{$article->title}}" class="form-control" required></p>
            <p>Автор:<br>
                <input type="text" name="author" value="{{$article->author}}" class="form-control" required></p>
            <p>Короткий текст:<br>
                <textarea name="short_text" class="form-control">{!! $article->short_text!!}</textarea></p>
            <p>Полный текст:<br>
                <textarea name="full_text" class="form-control">{!! $article->full_text !!}</textarea></p>
            <button type="submit" class="btn btn-success" style="cursor: pointer; float: right;">Редактировать</button>
            <br>
            <br>
        </form>



    </main>
@endsection