<table id="filter" class="table table-hover-pointer table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>
                <div>Waktu</div> <div>Checkin</div>
            </th>
            <th><div>Kota</div> <div>Checkin</div></th>
            <th><div>Waktu</div> <div>Checkout</div></th>
            <th><div>Kota</div> <div>Checkout</div></th>
        </tr>
    </thead>
    <tbody>

        @if ($viewModel->data->attend_list)
            @foreach ($viewModel->data->attend_list as $item)
                <tr>
                    <td>{{ $item->attend_dt }}</td>
                    <td>{{ $item->checkin_time }}</td>
                    <td>{{ $item->checkin_city }}</td>
                    <td>{{ $item->checkout_time }}</td>
                    <td>{{ $item->checkout_city }}</td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
