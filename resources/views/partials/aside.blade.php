  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{route('showHome')}}" class="brand-link">
          <img src="{{asset('/img/whbi.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Batch system</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{asset('/img/wh-user.jpg')}}""
           class=" img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{Auth::user()->formatName()}}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">


                  @permit('fourthStep')
                  <li class="nav-item mb-5">
                      <a href="{{route('showHome')}}" class="nav-link {{Route::is('showHome') ? 'active' : ''}}">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Reportings

                          </p>
                      </a>
                  </li>
                  @endpermit





                  @permit('firstStep')
                  <li class="nav-item has-treeview">
                      <a href="{{route('showBatches')}}" class="nav-link {{Route::is('showBatches') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-warehouse"></i>
                          <p>
                              Room 1 management

                          </p>
                      </a>

                  </li>

                  @endpermit


                  @permit('secondStep')

                  <li class="nav-item has-treeview">
                      <a href="{{route('showRoomTwoBatches')}}"
                          class="nav-link {{Route::is('showRoomTwoBatches') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-warehouse"></i>
                          <p>
                              Room 2 management

                          </p>
                      </a>

                  </li>

                  @endpermit

                  @permit('thirdStep')

                  <li class="nav-item has-treeview">
                      <a href="{{route('showRoomThreeBatches')}}"
                          class="nav-link {{Route::is('showRoomThreeBatches') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-warehouse"></i>
                          <p>
                              Room 3 management

                          </p>
                      </a>

                  </li>
                  @endpermit


                  {{-- <li class="nav-item has-treeview">
                      <a href="{{route('showExtraBatches')}}"
                          class="nav-link {{Route::is('showExtraBatches') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-warehouse"></i>
                          <p>
                              Extra Batches management

                          </p>
                      </a>

                  </li> --}}
                  @permit('fourthStep')
                  <li class="nav-item has-treeview">
                      <a href="{{route('showReselledBatches')}}"
                          class="nav-link {{Route::is('showReselledBatches') ? 'active' : ''}}">
                          <i class="nav-icon fas fa-warehouse"></i>
                          <p>
                              Reselled Batches

                          </p>
                      </a>

                  </li>
                  @endpermit

                  @permit('superadmin')
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-sliders-h"></i>
                          <p>
                              Settings
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview" style="{{
                      Route::is('showUsers') ||
                      Route::is('showSeasons') || 
                      Route::is('showCountries') ||
                      Route::is('showCategories') ||
                      Route::is('showQualities') ||
                      Route::is('showPricings') 
                      ? 'display: block;' : ''}}">
                          <li class="nav-item">
                              <a href="{{route('showSeasons')}}"
                                  class="nav-link {{Route::is('showSeasons') ? 'active' : ''}}">

                                  <i class="nav-icon fas fa-tshirt"></i>
                                  <p>
                                      Seasons
                                  </p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{route('showCountries')}}"
                                  class="nav-link {{Route::is('showCountries') ? 'active' : ''}}">

                                  <i class="nav-icon far fa-flag"></i>
                                  <p>
                                      Countries
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('showCategories')}}"
                                  class="nav-link {{Route::is('showCategories') ? 'active' : ''}}">
                                  <i class="nav-icon fas fa-list"></i>
                                  <p>
                                      Categories
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item has-treeview">
                              <a href="{{route('showQualities')}}"
                                  class="nav-link {{Route::is('showQualities') ? 'active' : ''}}">
                                  <i class="nav-icon fas fa-thumbs-up"></i>
                                  <p>
                                      Quality

                                  </p>
                              </a>

                          </li>

                          <li class="nav-item has-treeview">
                              <a href="{{route('showPricings')}}"
                                  class="nav-link {{Route::is('showPricings') ? 'active' : ''}}">

                                  <i class="nav-icon fas fa-dollar-sign"></i>
                                  <p>
                                      Pricings

                                  </p>
                              </a>

                          </li>
                          <li class="nav-item has-treeview">
                              <a href="{{route('showUsers')}}"
                                  class="nav-link {{Route::is('showUsers') ? 'active' : ''}}">
                                  <i class="nav-icon fas fa-users"></i>
                                  <p>
                                      Users

                                  </p>
                              </a>

                          </li>


                      </ul>
                  </li>


                  @endpermit






              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
