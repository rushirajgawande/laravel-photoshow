@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <br>
            <h4>
               Upload Photo:
            </h4>
            <hr>
            {!!Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
            <div class="card rounded border-dark">
               <div class="card-body">
                  <div class="form-group">
                     <label for="text">Photo Title:</label>
                     <input type="text" value="" name="title" class="form-control" placeholder="Enter Photo name" required>
                  </div>
                  <div class="form-group">
                     <label for="text">Photo Description:</label>
                     <textarea rows="5" name="description" type='text' cols="50" name="body" class="form-control" placeholder="Enter Details"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="file">Add Photo:</label>
                     <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                     <input type="file" value="" name="photo" required>
                  </div>
                  {{Form::hidden('album_id', $album_id)}}
                  <div class="form-group">
                     <button type="submit" name="button" class="btn btn-primary rounded hoverable">Submit</button>
                  </div>
                  {!!Form::close()!!}
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
