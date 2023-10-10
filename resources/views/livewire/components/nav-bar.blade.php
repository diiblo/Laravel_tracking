<nav class="mb-4 bg-white shadow navbar navbar-expand topbar static-top navbar-light">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown d-sm-none no-arrow">
                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                    <i class="fas fa-search"></i>
                </a>
                <div class="p-3 dropdown-menu dropdown-menu-end animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="me-auto navbar-search w-100">
                        <div class="input-group">
                            <input class="border-0 bg-light form-control small" type="text" placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="py-0 btn btn-primary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="mx-1 nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="badge bg-danger badge-counter">{{ count($documents) }}</span>
                        <i class="fas fa-bell fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                        <h6 class="dropdown-header">centre de notification</h6>
                        @if(count($documents) > 0)
                            @foreach ( $documents as $document )
                                <a wire:key="{{ $document->id }} class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-primary icon-circle">
                                            <i class="text-white fas fa-file-alt"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 small">{{ $document->updated_at }}</span>
                                        <p>{{ $document->send }} vous a envoyé un document, vérifier</p>
                                    </div>
                                </a>                       
                            @endforeach  
                        @endif
                    </div>
                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="text-gray-600 d-none d-lg-inline me-2 small">{{ $user->name }}</span>
                        <img class="border rounded-circle img-profile" src="{{ asset('img/user/'.$user->image.'') }}">
                    </a>
                    <div class="shadow dropdown-menu dropdown-menu-end animated--grow-in">
                        <a class="dropdown-item" href="{{ route('profil') }}">
                            <i class="text-gray-400 fas fa-cogs fa-sm fa-fw me-2"></i>&nbsp;Paramètre </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="text-gray-400 fas fa-sign-out-alt fa-sm fa-fw me-2"></i>&nbsp;{{ __('Déconnexion')  }}
                            </a>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>