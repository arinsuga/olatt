<table id="filter" class="table table-hover-pointer table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Dept</th>
            <th>Tanggal</th>
            <th>Waktu Checkin</th>
            <th>Kota Checkin</th>
            <th>Waktu Checkout</th>
            <th>Kota Checkout</th>
        </tr>
    </thead>
    <tbody>

        @if ($viewModel->data)
            @foreach ($viewModel->data as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->dept }}</td>
                    <td>{{ \Arins\Facades\Formater::dateMonth($item->attend_dt) }}</td>
                    <td>{{ \Arins\Facades\Formater::time($item->checkin_time) }}</td>
                    <td>{{ $item->checkin_city }}</td>
                    <td>{{ \Arins\Facades\Formater::time($item->checkout_time) }}</td>
                    <td>{{ $item->checkout_city }}</td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
