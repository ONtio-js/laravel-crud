@extends('layouts.app')

@section('content')
<div class="m-auto w-4/8 py-24">
<div class="text-center">
    <h1 class="uppercase bold text-5xl">
        create car
    </h1>
</div>

<div class="flex justify-center pt-20">
    <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="block mb-2">
            <input type="file" class="block shadow-5xl mb-1 p-2 w-80 italic placeholder-gray-400" name="image" value="{{old('image')}}">
        
            @error('image')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="block mb-10">
            <input type="text" class="block shadow-5xl mb-1 p-2 w-80 italic placeholder-gray-400" placeholder=" Brand Name" name="name" value="{{old('name')}}">
        
            @error('name')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="block mb-10">
            <input type="text" class="block shadow-5xl mb-1 p-2 w-80 italic placeholder-gray-400" placeholder=" Founded" name="founded" value="{{old('founded')}}">
            @error('founded')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="block mb-10">
            <input type="text" class="block shadow-5xl mb-1 p-2 w-80 italic placeholder-gray-400" placeholder=" Description" name="description" value="{{old('description')}}">
            @error('description')
            <div class="text-red-500">
                {{$message}}
            </div>
            @enderror
        </div>

        <button type="submit" class=" rounded bg-blue-600 block shadow-5xl text-white p-2 mb-10 w-80 uppercase font-bold">submit</button>
    </form>
</div>
</div>
@endsection