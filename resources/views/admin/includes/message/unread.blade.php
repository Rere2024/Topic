   <div class="container my-5">
       <div class="mx-2">
           <div class="row justify-content-between mb-2 pb-2">
               <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
           </div>
           <div class="table-responsive">
               <table class="table table-hover table-borderless display" id="_table">
                   <thead>
                       <tr>
                           <th scope="col">Created At</th>
                           <th scope="col">Message</th>
                           <th scope="col">Sender</th>
                           {{-- <th scope="col">Delete</th> --}}
                           <th scope="col">Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($unreadcontacts as $contact)
                           <tr>
                               <th scope="row">{{ $contact->created_at->format('d M Y') }}</th>
                               <td><a href="{{ route('messages.show', $contact->id) }}"
                                       class="text-decoration-none text-dark">{{ Str::limit($contact['message'], 20, '.....') }}.</a>
                               </td>
                               <td>{{ $contact['sender_name'] }}</td>
                               <td class="text-center">
                                   <form action="{{ route('messages.markAsRead', $contact->id) }}" method="POST"
                                       style="display:inline;">
                                       @csrf
                                       @method('PATCH')
                                       <button type="submit" class="btn btn-primary">Mark as Read</button>
                                   </form>

                                   <form action="{{ route('messages.delete', $contact['id']) }}"
                                       onclick=" return confirm('Are you sure you want to delete?')"method="POST">
                                       @csrf
                                       @method('delete')
                                       <button type="submit" class="btn btn-link m-0 p-0">
                                           <img
                                               src="{{ asset('adminassets/images/trash-can-svgrepo-com.svg') }}"></button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
       <hr>
