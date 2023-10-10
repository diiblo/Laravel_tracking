<nav class="p-0 navbar align-items-start sidebar sidebar-dark accordion bg-delotrans-gradient-primary navbar-dark">
    <div class="p-0 container-fluid d-flex flex-column">
        <a class="m-0 navbar-brand d-flex justify-content-center align-items-center sidebar-brand" href="#">
            <div class="p-2 border rounded sidebar-brand-icon bg-light">
                <!-- Start: default image -->
                <x-application-logo class="img-fluid" style="width: 60px;" width="30" height="17" />
                <!-- End: default image -->
            </div>
        </a>
        <hr class="my-0 sidebar-divider">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="far fa-chart-bar"></i>
                    <span>
                        {{ __('Tableau de bord') }}
                    </span>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link :href="route('profil')" :active="request()->routeIs('profil')">
                    <i class="fas fa-user"></i>
                    <span>
                        {{ __('Profil') }}
                    </span>
                </x-nav-link>
            </li>
            @if(auth()->user()->fonction->id == 1)
                <li class="nav-item">
                    <x-nav-link :href="route('personnel')" :active="request()->routeIs('personnel')">
                        <i class="fas fa-users"></i>
                        <span>
                            {{ __('Personnel') }}
                        </span>
                    </x-nav-link>
                </li>   
            @endif
            <li class="nav-item">
                <!-- Start: custom dropdown with icon -->
                <div>
                    <x-nav-link-collapse 
                        :active="request()->routeIs(['document', 'suivi', 'archive'])" 
                        aria-controls="collapse-1"
                        href="#collapse-1">
                        <i class="fas fa-file-alt"></i>&nbsp; <span>Documents</span>
                    </x-nav-link-collapse>
                    <div class="collapse" id="collapse-1">
                        <div class="py-2 bg-white border rounded collapse-inner">
                            <h6 class="collapse-header">Actions:</h6>
                            <a class="collapse-item" href="{{ route('document') }}">Mes documents</a>
                            <a class="collapse-item" href="{{ route('suivi') }}" title="suivi des documents">Suivis</a>
                            <a class="collapse-item" href="{{ route('archive') }}" title="archives des documents">Archives</a>
                        </div>
                    </div>
                </div>
                <!-- End: custom dropdown with icon -->
            </li>
            @if(auth()->user()->fonction->id == 1)
                <li class="nav-item">
                    <x-nav-link :href="route('fonction')" :active="request()->routeIs('fonction')">
                        <i class="fas fa-briefcase"></i>
                        <span>
                            {{ __('Fonctions') }}
                        </span>
                    </x-nav-link>
                </li>    
            @endif
        </ul>
        <div class="text-center d-none d-md-inline">
            <button class="border-0 btn rounded-circle" id="sidebarToggle" type="button"></button>
        </div>
    </div>
</nav>