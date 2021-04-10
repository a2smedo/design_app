<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="javascript:;" aria-expanded="fals" title="Notifications">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ $notifications_count }}
        </span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left " style="left: inherit; right: 0px; width: 300px;">
        <span class="dropdown-item dropdown-header">

          {{ $notifications_count }}

          @if ($notifications_count > 1)
            Notifications
          @else
            Notification
          @endif

        </span>

        @foreach ($notifications as $noti)

          <div class="dropdown-divider"></div>

          @if ($noti->type == 'order')

            <a href="{{ url('/dashboard/orders') }}" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i>

              <span class="text-muted">
                {{ $noti->where('type', 'order')->count() }}

              </span>
              <span class="ml-1 text-muted"> {{ $noti->message }} </span>
              <span class="float-right text-muted text-sm">{{ $currentMin }} mins</span>
            </a>

         @else
            <a href="{{ url('/dashboard/users') }}" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i>

              <span class="text-muted">

                {{ $noti->where('type', 'user')->count() }}
              </span>
              <span class="ml-1 text-muted"> {{ $noti->message }} </span>
              <span class="float-right text-muted text-sm">{{ $currentMin }} mins</span>
            </a>
          @endif

          <div class="dropdown-divider"></div>
          @endforeach
          <a href="{{ url('/dashboard/notifications') }}" class="dropdown-item dropdown-footer">See All
            Notifications</a>

      </div>
    </li>


    <li class="nav-item ">
      <a id="logout" href="{{ route('logout') }}" class="nav-link" title="Logout">
        <i class="nav-icon fas fa-sign-out-alt " style="font-size: 23px !important"></i>
      </a>

      <form id="logout_form" action=" {{ route('logout') }} " method="post" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>

</nav>
