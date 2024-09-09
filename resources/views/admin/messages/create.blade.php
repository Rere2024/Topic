
  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Add Message</h2>
      <form  action="{{route('messages.store')}}" method="POST"  class="px-md-5" >
          @csrf

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Sender Name:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Design Patterns" name="sender_name" class="form-control py-2"value="{{old('sender_name')}}" />
              @error('sender_name')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
          <div class="col-md-10">
             <input type="number" name="email" id="" rows="5" class="form-control" value={{old('email')}}>
                @error('email')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Message:</label>
          <div class="col-md-10">
            <textarea name="message" id="" rows="5" class="form-control" {{old('message')}}></textarea>
                @error('message')
              <div class="alert alert-warning">{{$message}}</div>
              @enderror
          </div>
        </div>
        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Send Message
          </button>
        </div>
      </form>
    </div>
  </div>
  </main>