<div class="row">
  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Nama</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->name }}
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Depertemen</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->dept }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Waktu Checkin</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->checkin_time }}
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Kota Checkin</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->checkin_city }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Waktu Checkout</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->checkout_time }}
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <!-- text input -->
    <div class="form-group">
      <label>Kota Checkout</label>
      <div class="form-control" style="border-top:none;border-left:none;border-right:none;">
        {{ $viewModel->data->user->checkout_city }}
      </div>
    </div>
  </div>
</div>
