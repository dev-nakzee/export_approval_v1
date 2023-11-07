<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Dashboard</span>
        </a>

        <ul class="sidebar-nav">
            @if($modules)
            @foreach($modules as $module)
                <li class="sidebar-item">
                    <a href="#{{$module->module}}" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="false">
                        <i class="fa-regular {{$module->icon}}"></i><span class="align-middle">{{ucfirst(str_replace('-',' ', $module->module))}}</span><i class="align-middle float-end fa-regular fa-angle-down"></i>
                    </a>
                    @if($submodules)
                    <ul id="{{$module->module}}" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
                        @foreach($submodules as $submodule)
                        @if($module->id == $submodule->mod_id)
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route($submodule->link)}}">{{ucfirst(str_replace('-',' ', $submodule->submodule))}}</a>
                        </li>
                        @endif
                        @endforeach
                        
                    </ul>
                    @endif                   
                </li>
            @endforeach
            @endif
        </ul>
    </div>
</nav>