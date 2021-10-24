<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('layouts.head')

   <body>
      <div class="flex-1 focus:outline-none">

         @include('layouts.nav')

         <main class="flex-1 relative z-0">
            <!-- Page header -->
             @yield('content')

         </main>
      </div>
      <div>
         <p class="text-center p-4 text-sm font-light text-gray-600">
            Copyright © 2021. All rights reserved
          </p>
      </div>
      @include('layouts.scripts')
   </body>
</html>