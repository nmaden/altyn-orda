@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>ФИО</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>
                                Фото 
                                @if ($user->photo)
                                    (уже загружено <a href="{{ fileLink($user->photo) }}" target="_blank">просмотреть</a>)
                                @endif
                            </label>
                            <input type="file" name="photo" class="form-control"  >
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Старый пароль</label>
                                <input type="password" name="old_pass"  class="form-control" >
                            </div>
                            <div class="col-md-6">
                                <label>Новый пароль</label>
                                <input type="password" name="new_pass"  class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Сохранить</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
                
            </div>
        </div>
    </div>

@endsection
