@extends('Layout.master')
@section('title')
Health Insurace
@endsection
@section('section')
<table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">
    <tbody>
        @foreach ($policies as  $policy)
        <br>
        <tr>
            <td>{{ $policy['policyname'] }} </td>
            <td> Premium Amount  : {{  $policy['p_price'] * ((100+Session::get('risks')) / 100) }}  : Org :  {{ $policy['p_price'] }} </td>
            <td> Insured Amount  : {{  $policy['c_price']   }} </td>
            <td> Policy Period :  {{ $policy['policy_period'] }} </td>
            <td><div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary" type="button">View Details</button>
                <button class="btn btn-primary" type="button">Buy</button>
            </div></td>
        </tr>
            @endforeach
    </tbody>
</table>
@endsection
