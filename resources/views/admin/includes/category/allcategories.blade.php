   <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="add_category.html" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->created_at->format('Y-m-d H:i:s')}}</th>
                            <td>{{ $category->category_name }}</td>
                            <td><a href="{{route('categories.edit', $category['id'])}}">Edit
                            <img src="{{asset('adminassets/images/edit-svgrepo-com.svg')}}"></a></td>

                             {{-- <td class="text-center"><a class="text-decoration-none text-dark" href="#">
                            <img src="{{asset('adminassets/images/trash-can-svgrepo-com.svg')}}"></a></td> --}}

                            <td>
                            <form action="" 
                            onclick=" return confirm('Are you sure you want to delete?')"method="POST" >
                            @csrf
                            @method("delete")
                            <img src="{{asset('adminassets/images/trash-can-svgrepo-com.svg')}}"></a></td>
                            <button type="submit" class="btn btn-link m-0 p-0"><img src="{{asset('adminassets/images/trash-can-svgrepo-com.svg')}}"></button>
                           </form>
                            </td>
                            <img src="{{asset('adminassets/images/trash-can-svgrepo-com.svg')}}"></a></td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>