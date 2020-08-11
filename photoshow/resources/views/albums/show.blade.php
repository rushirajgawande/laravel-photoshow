@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            @if (count($album->photos) > 0)
            <h3>@php
            echo '<u>'.strtoupper($album->name).'</u><small> -Album</small>'
            @endphp:
         </h3>
            <a class="btn btn-secondary btn-sm" href="/">< Back</a>
            <a class="btn btn-info btn-sm" href="/photos/create/{{$album->id}}">Upload Photo to Album</a>
            <hr>
               <div class="row mr-auto ml-auto">
                  @foreach ($album->photos as $photo)
                     <div class="col-md-4">
                        <br>
                        <div class="card text-center border-dark">
                           <a href="/photos/{{$photo->id}}">
                              <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="img-responsive img-thumbnail card-img-top" alt="{{$photo->title}}" style="height:300px;width:300px;">
                           </a>
                           <div class="card-footer border-dark bg-white">
                              <h6>
                                 <b>
                                    {{$photo->title}}
                                 </b>
                              </h6>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            @else
               <br>
               <a class="btn btn-secondary btn-sm" href="/">< Back</a>
               <a class="btn btn-info btn-sm" href="/photos/create/{{$album->id}}">Upload Photo to Album</a>
               <hr>
               <p>No Photos exists:
                  <span class="text-primary">
                     <a href="/photos/create/{{$album->id}}">
                        <u>
                           Click to Add Photo
                        </u>
                     </a>
                  </span>
               </p>
            @endif
         </div>
      </div>
   </div>
</div>
@endsection
