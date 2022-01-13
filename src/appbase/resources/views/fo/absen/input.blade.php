<form id="frmSubmit" style="margin:10px;" method="POST" action="{{ route($viewModel->data->action) }}">
    @csrf
    <div>
        <input type="hidden" name="attend_id" value="{{ $viewModel->data->user->attend_id }}">
        <input type="hidden" id="latitude" name="latitude" placeholder="latitude">
        <input type="hidden" id="longitude" name="longitude" placeholder="longitude">
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <input type="hidden" name="testonly[0]" value="nama 1">
    <input type="hidden" name="testonly[1]" value="nama 2">

    <div class="card">

        @if ($viewModel->data->user->checkout_time ==null)
            <div class="card-header">
                <button id="btnSubmit" type="button" class="btn btn-primary">{{ $viewModel->data->action_button }}</button>
            </div>
        @endif

        <div class="card-body table-responsive">
            @if ($viewModel->data !=null)
                @include('fo.absen.data-field-items')
            @endif
        </div>
    </div>

</form>
