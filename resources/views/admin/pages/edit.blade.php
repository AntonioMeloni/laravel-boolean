@php
    $categories = [
        [
            'id'=> 1,
            'title'=> 'Miscellanea'
        ],
        [
            'id'=> 2,
            'title'=> 'Cucina'
        ],
        [
            'id'=> 3,
            'title'=> 'Giardino'
        ],
    ];

    $tags = [
          [
            'id' => 1,
            'name' => 'Tag 1'
          ],
          [
            'id' => 2,
            'name' => 'Tag 2'
          ],
          [
            'id' => 3,
            'name' => 'Tag 3'
          ],
          [
            'id' => 4,
            'name' => 'Tag 4'
          ],
          [
            'id' => 5,
            'name' => 'Tag 5'
          ],
          [
            'id' => 6,
            'name' => 'Tag 6'
          ],
          [
            'id' => 7,
            'name' => 'Tag 7'
          ],
    ];

    $photos = [
          [
            'id' => 1,
            'title' => 'Image 1',
            'path' => 'images/nomefoto1.jpg'
          ],
            [
              'id' => 2,
              'title' => 'Image 2',
              'path' => 'images/nomefoto2.jpg'
          ],
            [
              'id' => 3,
              'title' => 'Image 3',
              'path' => 'images/nomefoto3.jpg'
          ],
            [
              'id' => 4,
              'title' => 'Image 4',
              'path' => 'images/nomefoto4.jpg'
          ],
            [
              'id' => 5,
              'title' => 'Image 5',
              'path' => 'images/nomefoto5.jpg'
          ],
    ];

    $page = [
      'id' => 1,
      'title' => 'lorem ipsum dolor sit	',
      'summary' =>  'lorem ipsum dolor sit	',
      'body' => 'Questo è un testo',
      'category_id' => 2,
      'tags' => [
        1 ,
        3 ,
        5
      ],
      'photos' => [
        3, 2
      ]
    ];

$oldtags = null;
$message = '';
@endphp


@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.pages.index')}}">Pages</a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Edit the page</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="Insert title" value="{{$page['title']}}">
                        @error('title')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Summary</label>
                        <input class="form-control" type="text" name="summary" id="summary" placeholder="Insert summary" value="{{$page['summary']}}">
                        @error('summary')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Category</label>
                        <select class="custom-select" name="category">
                            @foreach ($categories as $category)
                              @if($category['id'] == $page['category_id'])
                                  @php
                                    var_dump($category['id'], $category['id'] == $page['category_id']);
                                    $message = 'selected';
                                  @endphp
                                  <option value="{{$category['id']}}" {{$message}}>{{$category['title']}}</option>
                              @else
                                  <option value="{{$category['id']}}">{{$category['title']}}</option>
                              @endif
                            @endforeach
                        </select>
                        @error('category')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Body</label>
                        <textarea class="form-control" name="body" rows="8">{{$page['body']}}</textarea>
                        @error('body')
                            <small class="form-text">Errore</small>
                        @enderror
                    </div>
                    <div class="form-group">
                      <fieldset>
                        <legend>Tags</legend>
                        @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            @if(is_array($oldtags))
                           <input class="form-check-input"  type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}"
                           {{
                             (in_array($tag['id'],  $oldtags))

                             ? 'checked' : ''
                           }}
                           >
                           @else
                             <input class="form-check-input"  type="checkbox" name="tags[]" id="tag{{$tag['id']}}" value="{{$tag['id']}}"
                           {{
                             (in_array($tag['id'],  $page['tags']))

                             ? 'checked' : ''
                           }}
                            >
                       @endif
                          <label class="form-check-label" for="tag{{$tag['id']}}">{{$tag['name']}}</label>
                        </div>
                        @endforeach
                      @error('tags')
                        <small class="form-text">Errore</small>
                      @enderror
                      </fieldset>
                    </div>
                    <div class="form-group">
                 <fieldset>
                     <legend>Photos</legend>
                    @foreach ($photos as $photo)
                      <div class="form-check form-check-inline">
                        <input class="form-check-input"  type="checkbox" name="photos[]" id="photo{{$photo['id']}}" value="{{$photo['id']}}">
                        <label class="form-check-label" for="photo{{$photo['id']}}">{{$photo['title']}}
                        <img src="{{$photo['path']}}" alt=""></label>
                    </div>
                    @endforeach
                    @error('photos')
                      <small class="form-text">Errore</small>
                    @enderror
                 </fieldset>
               </div>
               <div class="form-group">
                   <input type="submit" value="Salva" class="btn btn-primary">
               </div>
                </form>
            </div>
        </div>
    </div>
@endsection
