<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('uploads/'.general('logo')) }}" width="150" height="100" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link active" href="#home">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">about us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#products">products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pricing">pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contactUs">contact us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blogs.front') }}">blogs</a>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-primary login" href="#">log in</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary signup" href="#">sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>