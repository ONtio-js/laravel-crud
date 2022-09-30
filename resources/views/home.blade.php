@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

           <x-alert/>
            </section>
            <div class="m-auto w-4/5 py-24">
                <div class="text-center">
                    <h1 class="text-5xl uppercase bold">
                        cars
                    </h1>
                </div>
                @if ($message = Session::get('message'))
                    <div class="alert alert-warning alert-block bg-green-100 rounded w-1/3 py-5 text-center text-green-700">


                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                <div class=" m-auto w-4/5 py-10">
                    <div class="pt-10 mb-10">
                        <a href="{{ route('cars.create') }}" >
                           <button class="bg-blue-600 block shadow-5xl p-2 text-center rounded mb-10 text-white  uppercase font-bold">add</button></a>
                    </div>
                    @forelse ($cars as $car)
                        @if (Auth::user()->id == $car->user_id)
                            <div class="m-auto">
                                <div class="float-right">
                                    <a href="{{ route('cars.edit', $car->id) }}"><button class="bg-green-600 block shadow-5xl p-2 rounded mb-10 text-white  uppercase font-bold">Edit</button>  </a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" class="mt-10" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="bg-red-700 block shadow-5xl p-2 rounded mb-10 text-white  uppercase font-bold">Delete</button>

                                    </form>
                                </div>

                                <span class="uppercase text-blue-500 font-bold text-xs intalic">
                                    founded : {{ $car->founded }}
                                </span>
                                <img src="{{ asset('images/' . $car->image_path) }}" alt="" srcset=""
                                    class="w-1/6 mt-1 shadow-xl mb-3">
                                <h2 class="text-gray-700 text-5xl hover:text-green-500 ">
                                    <a href="{{ route('cars.show', $car->id) }}" class="capitalize"> {{ $car->name }}</a>
                                </h2>
                                <p class="text-lg text-gray-500 py-6">
                                    {{ $car->description }}
                                </p>
                                <hr class="mt-4 mb-8">
                            </div>
                        @endif

                    @empty
                        <h2 class="uppercase text-blue-500 font bold text-center"> no cars in the list</h2>
                    @endforelse
                </div>
                {{ $cars->links() }}

            </div>
        </div>
    </main>
@endsection
