<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidation;
use App\Models\car;
use App\Models\Headquarter;
use Illuminate\Http\Request;

class carController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['show','index']]);
    }
    public function index()
    {
        // $cars = car::all()->toArray();
        // $cars = car::all()->toJson();
        // $cars = json_decode($cars);

        // $car = car::chunk(5, function($cars){
        //     foreach($cars as $car){
        //         print_r($car);
        //     }
        // });
        // print_r(car::count());
        // print_r(car::sum('founded'));
        // print_r(car::avg('founded'));
        // var_dump($cars);

        
        $cars = car::orderBy('id','DESC')->paginate(3);

        return view('cars.index',[
            'cars'=>$cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestValidation $request)
    {
        // $car = new car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();
        // $request->all();
        // $request->only('founded');
        // $request->except('founded');
        // $request->has('_token')
        // $request->is('car')
        // $request->path()
        // $request->method()
        // $request->isMethod()
        // $request->url()
        // $request->ip()
        // for file upload 
        // $test = $request->file('image')->guessExtension();  for the extension of the file 
        // $test = $request->file('image')->getMimeType();  for type and extension of the file 
        // $test = $request->file('image')->store()
        // $test = $request->file('image')->getClientOriginalName();
        // $test = $request->file('image')->getClientMimeType();
        // $test = $request->file('image')->getSize();
        // $test = $request->file('image')->guessClientExtension();
        // $test = $request->file('image')->getError();
        // $test = $request->file('image')->isValid();
        // if($request->is('cars')){
        //     dd($request->ip());
        // }
        // dd($request->all());
       
        $request->validated();

        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
        car::create([
            'name'=>$request->input('name'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('home')->with('message','Car created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = car::find($id);
        // dd($car->product);
        $hq = Headquarter::find($id);
        // var_dump($hq);
        return view('cars.show')->with('car',$car);
    }

    /**8000
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
cars

     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = car::find($id);
        // dd($car);
        return view('cars.edit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestValidation $request, $id)
    {
        $request->validated();

        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
        $car = car::where('id',$id)->update([
            'name'=>$request->input('name'),
            'founded'=>$request->input('founded'),
            'description'=>$request->input('description'),
            'image_path'=>$newImageName
        ]);

        return redirect()->route('home')->with('message','Car updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = car::find($id);

        $car->delete();

        return redirect()->back()->with('message','Car list updated');
    }
}
