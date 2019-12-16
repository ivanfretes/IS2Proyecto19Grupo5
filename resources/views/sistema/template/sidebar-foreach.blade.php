

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{ $menuTop }}" aria-expanded="true" aria-controls="collapse{{ $menuTop }}">
      <i class="fas fa-fw fa-cog"></i>
      <span> {{ $menuTop }}</span>
    </a>
    <div id="collapse{{ $menuTop }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        
        @foreach($menuSidebar as $menuTitleHead => $menuSub)

            @foreach($menuSub as $menu)
                <a class="collapse-item" href="{{ $menu['route'] }}">
                  {{ $menu['title'] }}
                </a>      
            @endforeach
            
        @endforeach
      </div>
    </div>
  </li>


 