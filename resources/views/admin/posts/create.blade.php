<x-admin-master>

      @section('content')

         <h1>Create</h1>

         <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="title">Title</label>
               <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Enter title">
          </div>

          <div class="form-group">
            <label for="file">File</label>
                <input type="file"
                       name="post_image"
                       class="form-control-file">
          </div>

          <div class="form-group">
               <textarea name="body"
                         class="form-control"
                          id=""
                          cols="30"
                          rows="10"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>



         </form>

      @endsection


</x-admin-master>
