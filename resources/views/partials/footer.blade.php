<footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} <a href="/">Lebas</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>
@livewireScripts
@include('sweet::alert')
@stack('scripts')
</body>
</html>
