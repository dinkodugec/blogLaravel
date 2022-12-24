<x-admin-master>

  @section('content')



  <h1 class="h3 mb-4 text-gray-800">Profile for {{ $user->name }}</h1>

  <div class="row">
    <div class="col-sm-6">


      <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
          <img class="img-profile rounded-circle" height="200px" width="200px" src="{{ asset("storage/" . $user->avatar)  }}" alt="">
        </div>

       <div class="form-group">
        <input type="file" name="avatar">
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

   <div class="row">
      <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>

           <div class="class-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Options</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Options</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>>
                  </tr>
                </tfoot>
                  <tbody>
                    @foreach ($roles as $role )
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name}}</td>
                        <td>{{ $role->slug }}</td>
                        <td><button class="btn btn-primary">Attach</button></td>
                        <td><button class="btn btn-danger">Detach</button></td>
                        </tr>
                    @endforeach
                  </tbody>

              </table>
            </div>
           </div>

         </div>
      </div>
   </div>



  @endsection



</x-admin-master>
