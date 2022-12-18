<x-admin-master>

  @section('content')



  <h1 class="h3 mb-4 text-gray-800">Profile for {{ $user->name }}</h1>

  <div class="row">
    <div class="col-sm-6">


      <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
          <img class="img-profile rounded-circle" src="https://dummyimage.com/300x300/000/fff" alt="">
        </div>

       <div class="form-group">
        <input type="file">
       </div>

       <div class="form-group">
        <label for="name">Username</label>
           <input type="text"
                   name="username"
                   class="form-control"
                   id="username"
                   value="{{ $user->username }}">
      </div>

        <div class="form-group">
          <label for="name">NAme</label>
             <input type="text"
                     name="name"
                     class="form-control"
                     id="name"
                     value="{{ $user->name }}">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
             <input type="text"
                     name="email"
                     class="form-control"
                     id="email"
                     value="{{ $user->email }}">
        </div>


        <div class="form-group">
          <label for="password">Password</label>
             <input type="password"
                     name="password"
                     class="form-control"
                     id="password"
                     >
        </div>

        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
             <input type="password_confirmation"
                     name="password_confirmation"
                     class="form-control"
                     id="password_confirmation"
                     >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

       </form>


    </div>
  </div>





  @endsection



</x-admin-master>
