@include('inc.header')
@include('inc.topbar')
   <div class="row mr-auto ml-auto">
      <div class="col-md-12">
         <u>
         @include('inc.messages')
         </u>
      </div>
   </div>
@yield('content')
@include('inc.footer')
