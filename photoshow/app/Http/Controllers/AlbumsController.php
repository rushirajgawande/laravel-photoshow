<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
   public function index()
   {
      $albums = Album::with('Photos')->get();
      return view("albums.index")->with('albums',$albums);
   }
   public function create()
   {
      return view("albums.create");
   }
   public function store(Request $req)
   {
      //display filename with extenstion
      $filenameWE = $req->file('cover_image')->getClientOriginalName();

      //filename without extension
      $filename = pathinfo($filenameWE,PATHINFO_FILENAME);

      //get extension of the file
      $filenameExtension = $req->file('cover_image')->getClientOriginalExtension();

      //file name to be store into DB
      $filenametostore = $filename.'_'.time().'.'.$filenameExtension;

      //upload image stored in path=> 'storage/app/public/(optional)"Name of the folder provided" Here its album_covers'
      $path = $req->file('cover_image')->storeAs('public/album_covers',$filenametostore);

      //return $path;
      //create a sim link by cmd: php artisan storage:link  => this will store image in path =>'public/album_covers'

      //create album
      $album = new Album;
      $album->name = $req->input('name');
      $album->description = $req->input('description');
      $album->cover_image = $filenametostore;
      //Compulsory need to save else not displayed into DB
      $album->save();

      return redirect('/albums')->with('success','Album Created!!');
   }
   public function show($id)
   {
      $album = Album::with('Photos')->find($id);
      return view("albums.show")->with("album",$album);
   }
   public function destroy($id)
   {
      $album = Album::find($id);
      //Delete not only from Database but also from file stored where the actual image is stored
      //inclide the Use storage Library into this file=> use Illuminate\Support\Facades\Storage;
      if (Storage::delete('public/album_covers/'.$album->cover_image)) {
         $album->delete();
          return redirect('/')->with('success','Album Deleted Successfully!');
      }
   }
}
