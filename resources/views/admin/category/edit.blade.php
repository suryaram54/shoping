<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b> edit category </b>
          <b style="float:right">
        
        </b>
        </h2>
    </x-slot>

      <div class="py-12">
        <div class="container">
           <div class="row">
               
<div class="col-md-8">
              <div class="card">
                  <div class="card-header" style="text-align:center">edit category</div>

                <div class="card-body">
                  <form action="{{url('category/update/'.$category->id)}}" method="POST">
                    @csrf
  <div class="form-group px-3  ">
    <label for="exampleInputEmail1">update category name</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->category_name}}">
  </div>
        @error('category_name')

            <span class="text-danger">{{$message}}</span>
        @enderror

  <div style="text-align:center"class="py-3">
  <button type="submit" class="btn btn-primary" >update category</button>
</div>
</form>


</div>


</div>

</div>

    </div>

</div>
</div>
  
</x-app-layout>
