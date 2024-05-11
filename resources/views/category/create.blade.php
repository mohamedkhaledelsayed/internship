@extends('layout')

@section('content')
    <main class="container">
       <!-- START FORM -->
       <form action='{{route('categories.store')}}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Nama ar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name_ar' id="name_ar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama en</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name_en' id="name_en">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Create</button></div>
            </div>
          </form>
        </div>
        
    </main>
  @endsection