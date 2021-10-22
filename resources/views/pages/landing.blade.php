<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('layouts.head')

   <body>
      <div class="flex-1 overflow-auto focus:outline-none">

         @include('layouts.nav')

         <main class="flex-1 relative z-0 overflow-y-auto">
            <!-- Page header -->
             @yield('content')

         </main>
      </div>
        @include('layouts.scripts')
   </body>
</html>