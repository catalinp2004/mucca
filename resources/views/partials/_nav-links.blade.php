<ul class="navbar-nav nav-all-pages">
    <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link">Home</a>
    </li>
    <li class="nav-item">
        <a href="{{route('povestea')}}" class="nav-link">{{__('Povestea noastra')}}</a>
    </li>
    <li class="nav-item">
        <a href="{{route('povestea')}}#servicii" class="nav-link" onclick="collapseNav()">{{__('Servicii')}}</a>
    </li>
    <li class="nav-item">
        <a href="{{route('catalog')}}" class="nav-link">Catalog</a>
    </li>
    <li class="nav-item">
        <a href="{{route('clienti')}}" class="nav-link">{{__('Clienți')}}</a>
    </li>
    <li class="nav-item">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
    </li>
</ul>
