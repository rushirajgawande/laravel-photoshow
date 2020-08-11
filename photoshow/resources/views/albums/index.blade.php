@extends('layouts.app')
@section('content')
   <div class="container">
      <br>
      @if (count($albums) > 0)
         <div class="row mr-auto ml-auto">
            @foreach ($albums as $album)
               <div class="col-md-4">
                  <div class="card border-dark">
                     <a href="/albums/{{$album->id}}">
                        <div class="card-body">
                           <img src="/storage/album_covers/{{$album->cover_image}}" class="card-img-top img-responsive img-thumbnail" alt="{{$album->name}}" style="height:300px;">
                        </div>
                     </a>
                     <div class="card-footer border-dark bg-white float-right">
                        <div class="row">
                           <div class="col-md-6">
                              <b>
                                 @php
                                 echo strtoupper($album->name);
                                 @endphp
                              </b>
                           </div>
                           <div class="col-md-6">
                              {!!Form::open(['action' => ['AlbumsController@destroy',$album->id], 'method' => 'POST'])!!}
                              {{Form::hidden('_method', 'DELETE')}}
                              <button type="submit" name="button" class="btn btn-danger btn-sm rounded float-right">Delete ALbum</button>
                              {!!Form::close()!!}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      @else
         <p>No Album exists</p>
      @endif
   </div>
@endsection
