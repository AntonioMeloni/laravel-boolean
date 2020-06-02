@php
    $pages = [
        [
            'id'=> 1,
            'title' => 'Lorem ipsum dolor sit',
            'category' => 'Miscellanea',
            'tags'=> [
                'tag 1','tag 2','tag 3','tag 4'
            ]
        ],
        [
            'id'=> 2,
            'title' => 'Due Lorem ipsum dolor sit',
            'category' => 'Cucina',
            'tags'=> [
                'tag 1','tag 8','tag 3','tag 5'
            ]
        ],
        [
            'id'=> 3,
            'title' => 'Tre Lorem ipsum dolor sit',
            'category' => 'Giardino',
            'tags'=> [
                'tag 1','tag 2','tag 3','tag 4'
            ]
        ]
    ];
@endphp


@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pages</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2>Pages</h2>
                    </div>
                    <div class="offset-3 col-3">
                        <a href="{{route('admin.pages.create')}}">Crea una pagina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$page['id']}}</td>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['category']}}</td>
                                <td>@foreach ($page['tags'] as $tag)
                                    {{$tag}}
                                    @if (!$loop->last)
                                        .
                                    @endif
                                @endforeach</td>
                                <td><a class="btn btn-primary" href="">Visualizza</a> </td>
                                  <td><a class="btn btn-info" href="">Modifica</a></td>
                                  <td>
                                    <form action="">
                                      <input class="btn btn-danger" type="submit" value="Elimina">
                                    </form>
                                  </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
