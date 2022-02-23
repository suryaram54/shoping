<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <b>  hi...{{Auth::User()->name}}</b>
          <b style="float:right"> total users 
          <span  style="color:red";class="badge badge-danger">{{ count($users) }}</span>
        </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
           <div class="row">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">create_at</th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
           </div>

        </div>
        
    </div>
</x-app-layout>
