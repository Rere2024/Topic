<div class="container my-5">
    <div class="mx-2">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Edit USER</h2>
        <form action="{{ route('users.update', $user->id) }}" method="post" class="px-md-5">
            @csrf
            @method('put')
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                <div class="col-md-5">
                    <input type="text" placeholder="First Name" class="form-control py-2" name="first_name"
                        value="{{ old('first_name', $user['first_name']) }}" />
                    @error('first_name')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <input type="text" placeholder="Last Name" class="form-control py-2"name="last_name"
                        value="{{ old('last_name', $user['last_name']) }}" />
                    @error('last_name')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
                <div class="col-md-10">
                    <input type="text" placeholder="e.g. Jhon33" class="form-control py-2" name="user_name"
                        value="{{ old('user_name', $user['user_name']) }}" />
                    @error('user_name')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
                <div class="col-md-10">
                    <input type="email" placeholder="e.g. Jhon@example.com" class="form-control py-2" name="email"
                        value="{{ old('email', $user['email']) }}" />
                    @error('email')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
                <div class="col-md-10">
                    <input type="password" placeholder="Password" class="form-control py-2" name="password" />
                    @error('password')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Phone:</label>
                <div class="col-md-10">
                    <input type="number" id="phone" placeholder="phone" class="form-control py-2" name="phone"
                        value="{{ old('phone', $user['phone']) }}) }}" />
                    @error('phone')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group mb-3 row">
                <label for="" class="form-label col-md-2 fw-bold text-md-end">Active:</label>
                <div class="col-md-10">
                    <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="active"
                        value="1" @checked(old('active', $user->active)) />
                </div>
            </div>
            <div class="text-md-end">
                <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                    Edit User
                </button>
            </div>
        </form>
    </div>
</div>
</main>
