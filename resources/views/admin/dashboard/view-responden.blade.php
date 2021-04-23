
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <a href="{{ route('ejdata.show') }}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-users"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Resonden</h4>
        </div>
        <div class="card-body">
          {{ $data->count() }}
        </div>
      </div>
    </div>
    </a>
  </div>

