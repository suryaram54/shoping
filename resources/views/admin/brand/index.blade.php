
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b> All brand </b>
          <b style="float:right">
        
        </b>
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="container">
           <div class="row">
               <div class="col-md-8">
              <div class="card">
<!-- 
              @if(session('success'))

              <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif -->

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 
                  <div class="card-header">All category</div>
             
           <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">brand_name</th>
      <th scope="col">brand_image</th>
      <th scope="col">create_at</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  
     @foreach($brands as $brand)
    <tr>
     
      <th scope="row">{{ $brand->id  }}</th>

      <td>{{$brand->brand_name}}</td>
      <td> <img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;" > </td> 

     
      <td>
      @if($brand->created_at == NULL)
      <span>data set chayyaledu guru</span>
      @else

        {{$brand->created_at->diffForHumans()}}
      @endif
      </td>
      <td>
    <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
    <a href="{{url('brand/delete/'.$brand->id)}}"onclick="return confirm('Are you sure to delete')" class="btn btn-danger">delete</a>



      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{$brands->links()}}
</div>

</div>

<div class="col-md-4">
              <div class="card">
                  <div class="card-header" style="text-align:center">Add Brand</div>

                <div class="card-body">
                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
  <div class="form-group px-3  ">
    <label for="exampleInputEmail1">Add category</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
        @error('brand_name')

            <span class="text-danger">{{$message}}</span>
        @enderror
        <div class="form-group">
    <label for="exampleInputEmail1">Brand Image</label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

          @error('brand_image')
               <span class="text-danger"> {{ $message }}</span>
          @enderror

  </div>

  <div style="text-align:center"class="py-3">
  <button type="submit" class="btn btn-primary" >Add brand</button>
</div>
</form>


</div>


</div>

</div>

    </div>

</div>



<!-- trash part start -->






<!-- trash part end -->





</div>
  
</x-app-layout>
