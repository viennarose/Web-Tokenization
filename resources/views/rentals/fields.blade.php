<!-- Customername Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CustomerName', 'Customername:') !!}
    {!! Form::text('CustomerName', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Address', 'Address:') !!}
    {!! Form::text('Address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Contact', 'Contact:') !!}
    {!! Form::number('Contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Cartype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CarType', 'Cartype:') !!}
    {!! Form::text('CarType', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Rentdays Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RentDays', 'Rentdays:') !!}
    {!! Form::number('RentDays', null, ['class' => 'form-control']) !!}
</div>

<!-- Daterented Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DateRented', 'Daterented:') !!}
    {!! Form::text('DateRented', null, ['class' => 'form-control','id'=>'DateRented']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#DateRented').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Datereturned Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DateReturned', 'Datereturned:') !!}
    {!! Form::text('DateReturned', null, ['class' => 'form-control','id'=>'DateReturned']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#DateReturned').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Rentamount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RentAmount', 'Rentamount:') !!}
    {!! Form::number('RentAmount', null, ['class' => 'form-control']) !!}
</div>

<!-- Rentpaid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RentPaid', 'Rentpaid:') !!}
    {!! Form::number('RentPaid', null, ['class' => 'form-control']) !!}
</div>