<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;//Delete not only from Database but also from file stored where the actual image is stored

class PhotosController extends Controller
{
   public function create($album_id)
   {
      return view('photos.create')->with('album_id',$album_id);
   }
   public function store(Request $req)
   {
      //display filename with extenstion
      $filenameWE = $req->file('photo')->getClientOriginalName();

      //filename without extension
      $filename = pathinfo($filenameWE,PATHINFO_FILENAME);

      //get extension of the file
      $filenameExtension = $req->file('photo')->getClientOriginalExtension();

      //file name to be store into DB
      $filenametostore = $filename.'_'.time().'.'.$filenameExtension;

      //upload image stored in path=> 'storage/app/public/(optional)"Name of the folder provided" Here its album_covers'
      $path = $req->file('photo')->storeAs('public/photos/'.$req->input('album_id'),$filenametostore);

      //return $path;
      //create a sim link by cmd: php artisan storage:link  => this will store image in path =>'public/album_covers'

      //create album
      $photo = new Photo;
      $photo->album_id = $req->input('album_id');
      $photo->title = $req->input('title');
      $photo->description = $req->input('description');
      $photo->size = $req->file('photo')->getSize();
      $photo->photo = $filenametostore;
      //Compulsory need to save else not displayed into DB
      $photo->save();

      return redirect('/albums/'.$req->input('album_id'))->with('success','Photo Uploaded!!');
   }
   public function show($id)
   {
      $photo = Photo::find($id);
      return view("photos.show")->with("photo",$photo);
   }
   public function destroy($id)
   {
      $photo = Photo::find($id);
      //Delete not only from Database but also from file stored where the actual image is stored
      //inclide the Use storage Library into this file=> use Illuminate\Support\Facades\Storage;
      if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
         $photo->delete();
          return redirect('/')->with('success','Photo Deleted Successfully!');
      }
   }
}
