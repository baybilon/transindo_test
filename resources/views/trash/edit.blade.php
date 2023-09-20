@extends('template.app')
  
@section('title', 'Update Jenis Sampah')
  
@section('contents')
    <hr />
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('trash.update', $trash->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3 sm-3">
            <div class="col-sm-3">
                <label>Jenis Sampah</label>
                <input type="text" name="type" class="form-control" placeholder="Jenis Sampah" value="{{ $trash->type }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <label>Harga</label>
                <input type="text" name="price" class="form-control" placeholder="Harga Per kg" value="{{ $trash->price }}">
            </div>
        </div>
 
        <div class="row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection