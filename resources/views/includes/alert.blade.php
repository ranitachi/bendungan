@if(Session::has('error'))
<div class="row mb-0">
  <div class="col-md-12">
    <div class="alert alert-custom alert-notice alert-light-danger fade" role="alert" style="display: flex !important;opacity:1 !important">
      <div class="alert-icon"><i class="flaticon-warning"></i></div>
      <div class="alert-text">
          <h4>Peringatan</h4>
          <ul>
                  <li>{{ Session::get('error') }}</li>
          </ul>
      </div>
      <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
          </button>
      </div>
  </div>
  </div>
</div>

@endif
{{-- <div class="col-md-12"> --}}
    {{-- @include('crud::inc.grouped_errors') --}}
{{-- </div> --}}
@if(Session::has('success'))
<div class="row mb-0">
  <div class="col-md-12">
    <div class="alert alert-custom alert-notice alert-light-success fade" role="alert" style="display: flex !important;opacity:1 !important">
      <div class="alert-icon"><i class="flaticon-check"></i></div>
      <div class="alert-text">
          <h4>Peringatan</h4>
          <ul>
                  <li>{{ Session::get('success') }}</li>
          </ul>
      </div>
      <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
          </button>
      </div>
  </div>
  </div>
</div>
@endif

@if(Alert::has('success'))
<div class="row mb-0">
  <div class="col-md-12">
    <div class="alert alert-custom alert-notice alert-light-success fade" role="alert" style="display: flex !important;opacity:1 !important">
      <div class="alert-icon"><i class="flaticon-check"></i></div>
      <div class="alert-text">
          <h4>Informasi</h4>
          <ul>
                  <li>{{ Alert::first('success') }}</li>
          </ul>
      </div>
      <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
          </button>
      </div>
  </div>
  </div>
</div>
@endif

@if(Alert::has('error'))
<div class="row mb-0">
  <div class="col-md-12">
    <div class="alert alert-custom alert-notice alert-light-danger fade" role="alert" style="display: flex !important;opacity:1 !important">
      <div class="alert-icon"><i class="flaticon-warning"></i></div>
      <div class="alert-text">
          <h4>Peringatan</h4>
          <ul>
                  <li>{{ Alert::get('error') }}</li>
          </ul>
      </div>
      <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true"><i class="ki ki-close"></i></span>
          </button>
      </div>
  </div>
  </div>
</div>
@endif