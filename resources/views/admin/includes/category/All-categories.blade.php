   <div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Categories</h2>
                <a href="{{route('categories.create')}}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new category</a>
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

                        <th scope="row">{{$category->created_at->format('d M Y')}}</th>
                        <td>{{ $category->category_name }}</td>
                         <td>

                            <a href="{{route('categories.edit', $category['id'])}}">
                            <img src="{{asset('adminassets/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td>
                            <form action="{{ route('categories.delete', $category->id) }}"
                            onclick=" return confirm('Are you sure you want to delete?')"method="POST" >
                            @csrf
                             @method("delete")
                            <button type="submit" class="btn btn-link m-0 p-0">
                            <img src="{{asset('adminassets/images/trash-can-svgrepo-com.svg')}}"></button>
                            </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>