<div>
    @if ($message = Session::get('welcome'))
    <div class=" alert-block bg-green-100 rounded w-1/3 py-5 text-center text-green-700 d-flex justify-between" X-data="{show: true}" 
    X-show="show" X-init = "setTimeout(() => show = false,3000)">


        <strong>{{ $message }}</strong>
     

    </div>
@endif
</div>