<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <img style="width: 70%; margin: 0 auto; margin-top: 11px" src="{{ url('images/system/logo_200x200.png') }}" alt="">
        <a href="index.html">MIDNERSI</a>

      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">MN</a>
      </div>

      <ul class="sidebar-menu">
        <li>
            <a href="{{ url('admin/dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Content</li>

        {{-- @php
            dd($globalFeatures->where('in_menu', '=', '1'));
        @endphp --}}
        @if (Auth::user()->role_id == 1)
            @foreach($globalFeatureCategories as $itemCategory)

                @if(count($globalFeatures->where('in_menu', '=', '1')->where('feature_category_id', '=', $itemCategory->id)) > 0)
                    <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas {{ $itemCategory->icon }}"></i><span>{{ $itemCategory->feature_category_name }}</span></a>
                        <ul class="dropdown-menu">
                        @foreach($globalFeatures->where('in_menu', '=', '1')->where('feature_category_id', '=', $itemCategory->id) as $itemFeature)
                            <li>
                                <a href="{{ url($itemFeature->slug) }}" style="padding-left: 19px !important;" class="nav-link {{ Request::is('$itemFeature->slug') ? 'mm-active' : '' }}"><i class="metismenu-icon"></i>{{ $itemFeature->feature_master_name }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        @endif

    </ul>




    </aside>
  </div>
