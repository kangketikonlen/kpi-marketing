 <div class="card">
     <div class="card-header pt-2 pb-2">
         <h4 class="m-0">Modul Tambahan</h4>
     </div>
     <div class="card-body p-2">
         <ul class="nav row text-center">
             @foreach ($moduleCustomUsers as $moduleCustomUser)
                 <li class="nav-item col-2">
                     <a class="nav-link d-flex flex-column align-items-center"
                         href="{{ $moduleCustomUser->moduleCustom->url }}">
                         <span class="d-inline-block bg-primary rounded p-3">
                             <i class="fa fa-2x {{ $moduleCustomUser->moduleCustom->icon }} order-1 text-white"></i>
                         </span>
                         <span class="order-2 mt-2">
                             <span class="fw-bold d-block">{{ $moduleCustomUser->moduleCustom->description }}</span>
                         </span>
                     </a>
                 </li>
             @endforeach
         </ul>
     </div>
 </div>
