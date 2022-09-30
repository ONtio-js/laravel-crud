@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
      <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            cars
        </h1>
      </div>
   
        
    <div class=" m-auto w-4/5 py-10">
        @if (Auth::user())
        <div class="pt-10 mb-10">
          <a href="{{ route('cars.create') }}" >
            <button class="bg-blue-600 block shadow-5xl p-2 text-center rounded mb-10 text-white  uppercase font-bold">add</button></a>
      </div>
        @endif
      @forelse ($cars as $car)
        <div class="m-auto">
            <div class="float-right">
               @if (Auth::user() != null && Auth::user()->id == $car->user_id)
               <a href="{{ route('cars.edit', $car->id) }}"><button class="bg-green-600 block shadow-5xl p-2 rounded mb-10 text-white  uppercase font-bold">Edit</button>  </a>
               @else 
               <a href="{{ route('cars.show',$car->id)}}"><button class="bg-yellow-600 block shadow-5xl p-2 rounded mb-10 text-white  uppercase font-bold"> view</button> </a> 
               @endif
                @if (Auth::user() != null && Auth::user()->id == $car->user_id)
                <form action="{{route('cars.destroy',$car->id)}}" class="mt-10" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit"
                    class="bg-red-700 block shadow-5xl p-2 rounded mb-10 text-white  uppercase font-bold">Delete</button>
    
                    </form>
                @endif
               
            </div>
            
            <span class="uppercase text-blue-500 font-bold text-xs intalic">
                founded : {{ $car->founded }}
            </span>
            <img src="{{asset('images/'.$car->image_path)}}" alt="" srcset="" class=" rounded w-1/6 mt-1 shadow-xl mb-3">
            <h2 class="text-gray-700 text-5xl hover:text-green-500">
               <a href="{{ route('cars.show',$car->id)}}" class="capitalize"> {{ $car->name }}</a> 
            </h2>
            <p class="text-lg text-gray-500 py-6">
                {{ $car->description}}
            </p>
            <hr class="mt-4 mb-8">
        </div>
      @empty
          <h2 class="uppercase text-blue-500 font bold text-center"> no cars in the list</h2>
      @endforelse
    </div>
    {{ $cars->links() }}

</div>
@endsection