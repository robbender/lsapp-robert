<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
        <a class="navbar-brand" href="/">{{config('layout.name', 'LSAPP') }}</a>
        <button class="navbar-toggle collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts/create" tabindex="-1" aria-disabled="true">Create Post</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
