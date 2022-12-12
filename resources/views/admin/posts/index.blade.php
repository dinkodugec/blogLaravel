<x-admin-master>

   @section('content')

   <h1 class="h3 mb-4 text-gray-800">All Posts</h1>

   @if(Session::has('message'))
      <div class="alert alert-danger">{{Session::get('message')}}</div>

      @elseif(session('post-created-message'))
      <div class="alert alert-success">{{session('post-created-message')}}</div>
      @elseif(session('post-updated-message'))
      <div class="alert alert-success">{{session('post-updated-message')}}</div>
    @endif

   <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Owner</th>
                <th>Title</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated_at</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
               <th>ID</th>
               <th>Owner</th>
               <th>Title</th>
               <th>Image</th>
               <th>Created At</th>
               <th>Updated_at</th>
               <th>Delete</th>
              </tr>
            </tfoot>
            <tbody>
               @foreach ($posts as $post)

               <tr>
                  <td>{{$post->id}} </td>
                  <td>{{ $post->user->name }}</td>
                  <td><a href="{{ route('post.update', $post->id) }}">{{ $post->title }}</a></td>
                  <td>   <img
                     height="40px"
                     src="{{ $post->post_image}}"
                     alt="Post Image File"
                 ></td>
                 <td>{{$post->created_at->diffForHumans()}}</td>
                 <td>{{$post->updated_at->diffForHumans()}}</td>
                 <td> <form method="post" action="{{route('post.destroy', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                 </td>
               </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

   @endsection


   @section('scripts')

     <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js') }}"></script>

   @endsection


</x-admin-master>
