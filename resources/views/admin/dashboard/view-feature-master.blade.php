
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <a href="{{ route('feature.show') }}">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-th"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Feature Master</h4>
        </div>
        <div class="card-body">
          {{ $data->count() }}
        </div>
      </div>
    </div>
    </a>
  </div>

