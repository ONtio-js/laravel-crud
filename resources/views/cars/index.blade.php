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
          <a href="{{route('cars.create')}}" class="border-b2 pb-5 border-dotted italic text-gray-500 ">
              add a new car &rarr;
          </a>
      </div>
        @endif
      @forelse ($cars as $car)
        <div class="m-auto">
            <div class="float-right">
               @if (Auth::user())
               <a href="{{route('cars.edit',$car->id)}}" class="border-b2 pb-5 border-dotted italic text-green-500 "> Edit &rarr;</a>
               @else 
               <a href="{{ route('cars.show',$car->id)}}" class=" border-b2 pb-5 border-dotted italic text-yellow-500">view</a> 
               @endif
                @if (Auth::user())
                <form action="{{route('cars.destroy',$car->id)}}" class="mt-10" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-b2 pb-5 border-dotted italic text-red-500">delete &rarr;</button>
    
                    </form>
                @endif
               
            </div>
            
            <span class="uppercase text-blue-500 font-bold text-xs intalic">
                founded : {{ $car->founded }}
            </span>
            <img src="{{asset('images/'.$car->image_path)}}" alt="" srcset="" class=" rounded w-1/6 mt-1 shadow-xl mb-3">
            <h2 class="text-gray-700 text-5xl hover:text-green-500">
               <a href="{{ route('cars.show',$car->id)}}"> {{ $car->name }}</a> 
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