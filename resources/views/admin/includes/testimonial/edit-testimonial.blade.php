 <div class="container my-5">
     <div class="mx-2">
         <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
         <form action="{{ route('testimonials.update', $testimonials->id) }}" method="post"
             class="px-md-5"enctype="multipart/form-data">
             @csrf
             @method('put')
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                 <div class="col-md-10">
                     <input type="text" placeholder="" class="form-control py-2" name="name"
                         value="{{ old('name', $testimonials['name']) }}" />
                     @error('name')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                 <div class="col-md-10">
                     <textarea name="content" id="" rows="5" class="form-control">{{ old('content', $testimonials->content) }}</textarea>
                     @error('content')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                 <div class="col-md-10">
                     <input type="checkbox" class="form-check-input" style="padding: 0.7rem;" name="published"
                         value="1" @checked(old('published', $testimonials->published)) />
                 </div>
             </div>
             <hr>
             <div class="form-group mb-3 row">
                 <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                 <div class="col-md-10">
                     <input type="file" class="form-control" style="padding: 0.7rem; margin-bottom: 10px;"
                         name="image" value="{{ old('image', $testimonials['image']) }}" />
                     <img src="{{ asset('adminassets/images/testimonials/' . $testimonials['image']) }}"
                         alt="{{ $testimonials->name }}" style="width: 10rem;">
                     @error('image')
                         <div class="alert alert-warning">{{ $message }}</div>
                     @enderror
                 </div>
             </div>
             <div class="text-md-end">
                 <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                     Edit Testimonial
                 </button>
             </div>
         </form>
     </div>
 </div>
 </main>
