@extends('layouts.app')
@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3>
               <u>
                  Create Albums:
               </u>
            </h3>
            {!!Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
            {{-- {{Form::text('name','',['placeholder' => 'Album name'])}}
            {{Form::textarea('description','',['placeholder' => 'Album Description'])}}
            {{Form::file('cover_image')}}
            {{Form::submit('submit')}} --}}
            <div class="card rounded border-dark">
               <div class="card-body">
                  <div class="form-group">
                     <label for="text">Album Name:</label>
                     <input type="text" value="" name="name" class="form-control" placeholder="Enter album name" required>
                  </div>
                  <div class="form-group">
                     <label for="text">Album Description:</label>
                     <textarea rows="5" name="description" type='text' cols="50" name="body" class="form-control" placeholder="Enter Details"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="file">Add Cover Image:</label>
                     <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                     <input type="file" value="" name="cover_image" required>
                  </div>
                  {{-- {{Form::hidden('_method', 'PUT')}} --}}
                  <div class="form-group">
                     <button type="submit" name="button" class="btn btn-primary">Submit</button>
                  </div>
                  {!!Form::close()!!}
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
