 <div class="app-sidebar-menu">
     <div class="h-100" data-simplebar>

         <!--- Sidemenu -->
         <div id="sidebar-menu">

             <div class="logo-box mt-1">
                 <a href="index.html" class="logo">
                     <span class="logo-sm">
                         <img src="{{ url('/') }}/assets/images/logo-light.png" alt="" height="40">
                     </span>
                     <span class="logo-lg">
                         <img src="{{ url('/') }}/assets/images/logo-light.png" alt="" height="68">
                     </span>
                 </a>
             </div>

             <ul id="side-menu">

                 <li>
                     <form id="login-form-admin" action="{{ config('app.hosting.url') . '/CMD_LOGIN' }}" method="POST"
                         name="form">
                         <input type=hidden name=referer value="/">
                         <input type=hidden name=FAIL_URL value="{{ config('app.hosting.url') }}/login_failed.html">
                         <input type=hidden name=LOGOUT_URL value="{{ config('app.hosting.url') }}/logged_out.html">
                         <input type=hidden name=username value="{{ config('app.hosting.username') }}">
                         <input type=hidden name=password value="{{ config('app.hosting.password') }}">
                         <button class="btn btn-primary w-100 mt-3" type="submit">
                             <i data-feather="server" width="16" height="16"></i>
                             <span class="ms-2">Log In Hosting Panel</span>
                         </button>
                     </form>
                 </li>

                 <li class="menu-title mt-2">Menu</li>


                 {{-- Admin Dashboard --}}
                 <li>
                     <a href="{{ url('admin/dashboard') }}" class="tp-link">
                         <i data-feather="home"></i>
                         <span> Dashboard </span>
                     </a>
                 </li>

                 {{-- Transactions --}}
                 <li>
                     <a href="{{ url('admin/transactions') }}" class="tp-link">
                         <i data-feather="credit-card"></i>
                         <span> Transactions </span>
                     </a>
                 </li>

                 <li class="menu-title mt-2">Data Master</li>
                 {{-- Users Menu --}}
                 <li>
                     <a href="{{ url('admin/users') }}" class="tp-link">
                         <i data-feather="users"></i>
                         <span> Users </span>
                     </a>
                 </li>

                 {{-- Packages Menu  --}}
                 <li>
                     <a href="{{ url('admin/packages') }}" class="tp-link">
                         <i data-feather="package"></i>
                         <span> Packages </span>
                     </a>
                 </li>

                 {{-- Layanan Menu --}}
                 <li>
                     <a href="{{ url('services') }}" class="tp-link">
                         <i data-feather="trello"></i>
                         <span> Services </span>
                     </a>
                 </li>

                 {{-- Database --}}
                 <li>
                     <a href="{{ url('databases') }}" class="tp-link">
                         <i data-feather="database"></i>
                         <span> Databases </span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ url('admin/domains') }}" class="tp-link">
                         <i data-feather="globe"></i>
                         <span> Domains </span>
                     </a>
                 </li>

                 <li class="menu-title mt-2">Settings</li>
                 <li>
                     <a href="apps-calendar.html" class="tp-link">
                         <i data-feather="settings"></i>
                         <span> Setting </span>
                     </a>
                 </li>
                 <li>
                     <a href="apps-calendar.html" class="tp-link">
                         {{-- <i data-feather="shield"></i> --}}
                         <i data-feather="log-out"></i>
                         <span> Logout </span>
                     </a>
                 </li>

             </ul>

         </div>
         <!-- End Sidebar -->

         <div class="clearfix"></div>

     </div>
 </div>
