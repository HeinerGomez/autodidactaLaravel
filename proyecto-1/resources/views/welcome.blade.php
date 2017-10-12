@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <form action="/message/create" method="post" >
        <div class="form-group @if ($errors->has('message')) has-danger @endIf">
            {{csrf_field()}}
            <input type="text" name="message" class="form-control" placeholder="¿ Que estas pensando ?" />
            <div class="form-control-feedback">
                @if ($errors->any())
                    @foreach($errors->get('message') as $error)
                        {{$error}}
                    @endForeach
                @endIf
            </div>
        </div>
    </form>
</div>
<div class="row">
    @forelse($messages as $message)
        <div class="col-6">
            <img class="img-thumbnail" src="{{$message->image}}">
            <p class="card-text">
                {{$message->content}}
                <a href="/messages/{{$message->id}}">Leer más</a>
            </p>
        </div>
    @empty
        <p>No se encontraron imagenes :( !</p>
    @endforelse
    @if (count($messages) )
        <div class="mt-2 mx-auto">
            {{$messages->links('pagination::bootstrap-4')}}
        </div>
    @endif
</div>
@endsection
