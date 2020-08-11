@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h4>@php
            echo '<u>'.strtoupper($photo->title).'</u><small> -Photo</small>'
            @endphp</h4>
            <a href="/albums/{{$photo->ablum_id}}">
               <button type="button" class="btn btn-primary btn-sm hoverable rounded" name="button">< Back to Gallery</button>
            </a>
            <hr>
            <div class="row">
               <div class="col-md-4">
                  <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" style="height:300px;width:300px">
               </div>
               <div class="col-md-6">
                  <small class="text-secondary">
                     <b>
                        Photo-Size: {{$photo->size}}
                     </b>
                  </small>
                  <br>
                  <span class="align-lefy">Photo Description: {{$photo->description}}</span>
               </div>
            </div>
            <hr>
            {!!Form::open(['action' => ['PhotosController@destroy',$photo->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            <div class="form-group">
               <button type="submit" name="button" class="btn btn-primary">Delete</button>
            </div>
            {!!Form::close()!!}
         </div>
      </div>
   </div>
@endsection
