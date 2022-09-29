@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        
        <div class="text-center">
           <img src="{{asset('images/'.$car->image_path)}}" alt="" srcset="" class="w-1/3 mx-auto border-rounded shadow-xl mb-3">
            <h1 class="text-5xl uppercase bold">
                {{ $car->name}}

            </h1>
           
             @if ($car->Headquarter)
             <h4 class="mt-2">
                headquarter: <span class="text-lg text-blue-500 py-3"> {{$car->Headquarter->country}}, {{$car->Headquarter->headquarter}}</span> 
              </h4>
             @endif
            <hr class="border-2b mt-2">
            <div>
                <span class="text-lg text-blue-500 py-2">
                    @forelse ($car->product as $product)
                        {{ $product->name }}
                    @empty
                        No product Description
                    @endforelse
                </span>
            </div>
        </div>
        <div class="m-auto">
            <div>
                <span class="text-gray-700 text-xl text-center block mt-2">
                     founded: {{ $car->founded}}
                </span>
                 <p class="text-lg text-gray-500 py-6 text-center">
                     {{ $car->description}}
                 </p>
                 <table class="mx-auto">
                    <tr class="bg-blue-100">
                        <th class="border-4 border-gray-500 w-1/3">
                            Model
                        </th>
                        <th class="border-4 border-gray-500 w-1/3 ">
                            Engines
                        </th>
                        <th class="border-4 border-gray-500 w-1/3">
                            Production Date
                        </th>
                    </tr>
                    @forelse ($car->CarModel as $model)
                        <tr>
                            <td class="border-4 border-gray-500">
                                {{$model->model_name}}
                            </td>
                            <td class="border-4 border-gray-500">
                                @forelse ($car->engine as $engine)
                                    @if ($model->id == $engine->model_id)
                                        {{ $engine->engine_name }}
                                    @endif
                                @empty
                                    
                                @endforelse
                            </td>
                            <td class="border-4 border-gray-500">
                                {{ date('d-m-Y', strtotime($car->production->created_at))}}
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">NO MODEL FOUND</p>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection
