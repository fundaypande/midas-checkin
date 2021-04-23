

<div class="col-lg-6 col-md-6 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="d-inline">History</h4>
        <div class="card-header-action">
        <a href="{{ route('history.show') }}" class="btn btn-primary">View All</a>
        </div>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">

            @foreach ($data as $item)
                <li class="media">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="cbx-1">
                    <label class="custom-control-label" for="cbx-1"></label>
                    </div>
                <img class="mr-3 rounded-circle" width="50" src="{{ $item->photo == null ? '/assets/img/avatar/avatar-1.png' : $item->photo }}" alt="avatar">
                    <div class="media-body">
                    <div class="badge badge-pill badge-{{ $item->action == 'delete' ? 'danger' : '' }}{{ $item->action == 'update' ? 'success' : '' }}{{ $item->action == 'store' ? 'primary' : '' }}{{ $item->action == 'restore' ? 'warning' : '' }} mb-1 float-right">{{ $item->action }}</div>
                    <h6 class="media-title"><a href="#">{{ $item->name }}</a></h6>
                    <div class="text-small text-muted">{{ $item->description }}<div class="bullet"></div> <span class="text-primary">{{ $item->created_at }}</span></div>
                    </div>
                </li>
            @endforeach


        </ul>
      </div>
    </div>
  </div>
