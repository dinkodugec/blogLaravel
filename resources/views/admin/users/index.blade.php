<x-admin-master>


    @section('content')
       <h1>Users</h1>

       @if(session('user-deleted'))
             <div class="alert alert-danger">{{ session('user-deleted') }}</div>
       @endif

       <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Of Users</h6>
          </div>

         <div class="class-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>UserName</th>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Registered date</th>
                  <th>Update Profile Data</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>UserName</th>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Registered date</th>
                  <th>Update Profile Data</th>
                  <th>Delete</th>
                </tr>
                <tbody>
                  @foreach ($users as $user )
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->username }}</td>
                      <th><img height="50x" width="200px" src="{{ asset("storage/" . $user->avatar)  }}" alt=""></th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->created_at->diffForHumans() }}</td>
                      <td>{{ $user->updated_at->diffForHumans() }}</td>
                      <th><form action="{{ route('user.destroy', $user->id) }}" method="post">
                           @csrf
                           @method('DELETE')


                           <button class="btn btn-danger">Delete</button>
                      </form></th>
                    </tr>
                  @endforeach
                </tbody>
              </tfoot>
            </table>
          </div>
         </div>

       </div>
    @endsection




</x-admin-master>
