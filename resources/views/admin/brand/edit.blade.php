<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b> edit brand </b>
          <b style="float:right">
        
        </b>
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="container">
           <div class="row">
               
<div class="col-md-8">
              <div class="card">
                  <div class="card-header" style="text-align:center">edit brand</div>

                <div class="card-body">
                  <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
    
  <div class="form-group px-3  ">
    <label for="exampleInputEmail1">update brand name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_name}}">
  </div>
        @error('brand_name')

            <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group px-3  ">
    <label for="exampleInputEmail1">update brand image</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$brands->brand_image}}">
  </div>
        @error('brand_image')

            <span class="text-danger">{{$message}}</span>
        @enderror
<div class="form-group">

<img src="{{asset($brands->brand_image)}}" style="width:400px;height:300px">


</div>
  <div style="text-align:center"class="py-3">
  <button type="submit" class="btn btn-primary" >update brand</button>
</div>
</form>


</div>


</div>

</div>

    </div>

</div>
</div>
  
</x-app-layout>
