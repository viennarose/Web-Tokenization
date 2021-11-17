<div class="table-responsive">
    <table class="table table-dark table-striped" id="rentals-table">
        <thead>
            <tr>
                <th>Customername</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Cartype</th>
        <th>Rentdays</th>
        <th>Daterented</th>
        <th>Datereturned</th>
        <th>Rentamount</th>
        <th>Rentpaid</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rentals as $rentals)
            <tr>
                <td>{{ $rentals->CustomerName }}</td>
            <td>{{ $rentals->Address }}</td>
            <td>{{ $rentals->Contact }}</td>
            <td>{{ $rentals->CarType }}</td>
            <td>{{ $rentals->RentDays }}</td>
            <td>{{ $rentals->DateRented }}</td>
            <td>{{ $rentals->DateReturned }}</td>
            <td>{{ $rentals->RentAmount }}</td>
            <td>{{ $rentals->RentPaid }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['rentals.destroy', $rentals->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rentals.show', [$rentals->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rentals.edit', [$rentals->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
