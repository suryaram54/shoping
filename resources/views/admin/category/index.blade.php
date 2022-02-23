<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b> All category </b>
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
      <th scope="col">category_name</th>
      <th scope="col">username</th>
      <th scope="col">create_at</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  
     @foreach($categories as $category)
    <tr>
      <!-- <th scope="row">{{ $categories->firstItem()+$loop->index   }}</th> -->
      <th scope="row">{{ $category->id  }}</th>

      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>

     
      <td>
      @if($category->created_at == NULL)
      <span>data set chayyaledu guru</span>
      @else

        {{$category->created_at->diffForHumans()}}
      @endif
      </td>
      <td>
    <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
    <a href="{{url('softdelete/category/'.$category->id)}}" class="btn btn-danger">delete</a>



      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{$categories->links()}}
</div>

</div>

<div class="col-md-4">
              <div class="card">
                  <div class="card-header" style="text-align:center">Add category</div>

                <div class="card-body">
                  <form action="{{route('store.category')}}" method="POST">
                    @csrf
  <div class="form-group px-3  ">
    <label for="exampleInputEmail1">Add category</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
        @error('category_name')

            <span class="text-danger">{{$message}}</span>
        @enderror

  <div style="text-align:center"class="py-3">
  <button type="submit" class="btn btn-primary" >Add category</button>
</div>
</form>


</div>


</div>

</div>

    </div>

</div>



<!-- trash part start -->




<div class="container">
           <div class="row">
               <div class="col-md-8">
              <div class="card">



                  <div class="card-header"> trashlist</div>
             
           <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">category_name</th>
      <th scope="col">username</th>
      <th scope="col">create_at</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  
     @foreach($trashcat as $category)
    <tr>
      <!-- <th scope="row">{{ $categories->firstItem()+$loop->index   }}</th> -->
      <th scope="row">{{ $category->id  }}</th>

      <td>{{$category->category_name}}</td>
      <td>{{$category->user->name}}</td>

     
      <td>
      @if($category->created_at == NULL)
      <span>data set chayyaledu guru</span>
      @else

        {{$category->created_at->diffForHumans()}}
      @endif
      </td>
      <td>
    <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">restore data</a>
    <a href="{{url('pdelete/category/'.$category->id)}}" class="btn btn-danger"> Pdelete</a>



      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{$trashcat->links()}}
</div>

</div>

<div class="col-md-4">
              
</div>

    </div>

</div>

<!-- trash part end -->





</div>
  
</x-app-layout>
