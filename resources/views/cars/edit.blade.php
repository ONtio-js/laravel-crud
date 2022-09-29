@extends('layouts.app')

@section('content')
<div class="m-auto w-4/8 py-24">
<div class="text-center">
    <h1 class="uppercase bold text-5xl">
        Update car
    </h1>
</div>

<div class="flex justify-center pt-20">
    <form action="{{route('cars.update',$car->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="block mb-2">
            <input type="file" class="block shadow-5xl mb-1 p-2 w-80 italic placeholder-gray-400" name="image">
        
            @error('image')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="block mb-10">
            <input type="text" class="block shadow-5xl p-2 w-80 italic placeholder-gray-400" value="{{$car->name}}" name="name">
            @error('name')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="block mb-10">
            <input type="text" class="block shadow-5xl p-2 w-80 italic placeholder-gray-400" value="{{$car->founded}}" name="founded">
            @error('founded')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="block mb-10">
            <input type="text" class="block shadow-5xl  p-2 w-80 italic placeholder-gray-400" value="{{$car->description}}"  name="description">
            @error('description')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-900 block shadow-5xl p-2 mb-10 text-white w-80 uppercase font-bold">submit</button>
    </form>
</div>
</div>
@endsection