 <div class="container my-5">
     <div class="mx-2">
         <h2 class="fw-bold fs-2 mb-5 pb-2">Add USER</h2>
         <form action="{{ route('users.store') }}" method="POST" class="px-md-5">
             @csrf
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                 <div class="col-md-5">
                     <input type="text" placeholder="First Name" class="form-control py-2" name="first_name"
                         value="{{ old('first_name') }}" />
                 </div>
                 <div class="col-md-5">
                     <input type="text" placeholder="Last Name" class="form-control py-2" name="last_name"
                         value="{{ old('last_name') }}" />
                     @error('first_name')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                     @error('last_name')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror

                 </div>
             </div>
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                 <div class="col-md-10">
                     <input type="text" placeholder="e.g. Jhon33" class="form-control py-2" name="user_name"
                         value="{{ old('user_name') }}" />
                     @error('user_name')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                 <div class="col-md-10">
                     <input type="email" placeholder="e.g. Jhon@example.com" class="form-control py-2" name="email"
                         value="{{ old('email') }}" />
                     @error('email')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>

             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
                 <div class="col-md-10">
                     <input type="password" placeholder="Password" class="form-control py-2"name="password"
                         value="{{ old('password') }}" minlength="8" required />
                     @error('password')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>

             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Confirm Password:</label>
                 <div class="col-md-10">
                     <input type="password" id="password_confirmation" placeholder="Confirm Password"
                         class="form-control py-2" name="password_confirmation"
                         value="{{ old('password_confirmation') }}" />
                     @error('password_confirmation')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>

             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Phone:</label>
                 <div class="col-md-10">
                     <input type="number" id="phone" placeholder="phone" class="form-control py-2" name="phone"
                         value="{{ old('phone') }}" />
                     @error('phone')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>

             <div class="text-md-end">
                 <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                     Add User
                 </button>
             </div>
         </form>
     </div>
 </div>
 </main>
