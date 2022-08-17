<div class="global-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <img src="{{asset('/assets/images/logo.png')}}" class="w-100" alt="logo">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li>
{{--                        <select name="category_id" class="form-control">--}}
{{--                            @foreach($categories as $item)--}}
{{--                                <option><a href="{{url('admin/category/'.'$item->id')}}"> {{$item->name}} </a></option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </li>


                    </li>

                </ul>

                <div>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown button
                            </button>
                        </div>
                        <a href="{{url('/login')}}" class="btn btn-primary">Login</a>
                        <a href="{{url('/register')}}" class="btn btn-primary">Login</a>
                    </form>

                </div>
            </div>
        </div>
    </nav>
</div>
<li>

