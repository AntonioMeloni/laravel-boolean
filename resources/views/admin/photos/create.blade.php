@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.photos.index')}}">Photos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="" action="{{route('admin.photos.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <h2>Inserisci una nuova foto</h2>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Insert title">
                        @error('title')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descrpition</label>
                        <input class="form-control" type="text" name="description" id="description" placeholder="Insert description">
                        @error('description')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="path" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('description')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" value="Salva" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
