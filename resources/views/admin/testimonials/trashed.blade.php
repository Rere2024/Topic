<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body>
    <main>
        <div class="container my-5">
            <div class="bg-light p-5 rounded">
                <h2 class="fw-bold fs-2 mb-5 pb-2">Trashed Testimonials</h2>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">Created At</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Published</th>
                            <th scope="col">Image</th>
                            <th scope="col">Restore</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <th scope="row">{{ $testimonial->created_at->format('d M Y') }}</th>
                                <td>{{ $testimonial['name'] }}</td>
                                <td>{{ Str::limit($testimonial['content'], 20, '.....') }}</td>
                                <td>
                                    @if ($testimonial['published'] == 1)
                                        yes
                                    @else
                                        no
                                    @endif
                                </td>
                                <td>{{ $testimonial['image'] }}</td>
                                <td>
                                    <form action="{{ route('testimonials.restore', $testimonial['id']) }}"
                                        method="POST">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-link m-0 p-0">Restore</button>
                                    </form>
                                <td>
                                    <form action="{{ route('testimonials.forceDelete', $testimonial['id']) }}"
                                        onclick=" return confirm('Are you sure you want to delete?')"method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link m-0 p-0">PremenentDelete</button>

                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
