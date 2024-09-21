      <header>
          <div class="p-3 text-center bg-white border-bottom welcome-section">
              <div class="container">
                  <div class="row justify-content-between">
                      <div class="col-md-3 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                          <a href="{{ url('/') }}" class="navbar-brand fs-2 fw-bold">
                              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16">
                                  <path fill="currentColor"
                                      d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                              </svg>

                              <span>Topic</span>
                          </a>
                      </div>
                      <div class="col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                          <ul class="navbar-nav">
                              <li class="nav-item dropdown dropdown-center user-dropdown">
                                  <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                                      aria-expanded="true">
                                      <img class="img-xs rounded-circle"
                                          src="{{ asset('adminassets/images/avatar-default.svg') }}"
                                          alt="Profile image" />
                                  </a>
                                  <div class="dropdown-menu dropdown-center navbar-dropdown"
                                      aria-labelledby="UserDropdown">
                                      <div class="dropdown-header text-center">
                                          <img class="img-md rounded-circle"
                                              src="{{ asset('adminassets/images/avatar-default.svg') }}"
                                              alt="Profile image" width="80" height="80" />
                                          <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->user_name }}</p>
                                          {{-- {{ Auth::user()->first_name }}
                                          {{ Auth::user()->email }} --}}
                                          <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                                      </div>
                                      <a class="dropdown-item" href="{{ route('profile') }}"> My Profile
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                          @csrf
                                      </form>


                                      <a class="dropdown-item" href="#"
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          Sign Out
                                      </a>
                                      <p class="footer" style="padding-top: 15px; font-size: 9px; text-align: center">
                                          Privacy Policy . Terms . Cookies
                                      </p>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <nav class="navbar navbar-expand-md bg-white border-bottom">
              <div class="container justify-content-md-center">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  USERS
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('users.create') }}">Add user</a></li>
                                  <li>
                                      <hr class="dropdown-divider" />
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('users.index') }}">All users</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  TOPICS
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('topics.create') }}">Add topic</a></li>
                                  <li>
                                      <hr class="dropdown-divider" />
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('topics.index') }}">All topics</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  CATEGORIES
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('categories.create') }}">Add category</a>
                                  </li>
                                  <li>
                                      <hr class="dropdown-divider" />
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('categories.index') }}">All
                                          categories</a>
                                  </li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  TESTIMONIALS
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('testimonials.create') }}">Add
                                          testimonial</a></li>
                                  <li>
                                      <hr class="dropdown-divider" />
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('testimonials.index') }}">All
                                          testimonials</a></li>
                              </ul>
                          </li>
                          <li><a class="nav-item nav-link" href="{{ route('messages.index') }}">MESSAGES</a></li>
                      </ul>
                  </div>
              </div>
          </nav>
      </header>
