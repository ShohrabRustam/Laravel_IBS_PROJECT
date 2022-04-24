@extends('Layout.master')
@section('title')
Life Insurace
@endsection
@section('section')
{{-- <h1 class="custom">Life Insurance</h1> --}}
<table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm">
    <tbody>
        @foreach ($policies as  $policy)
        <br>
        <tr>
            <td>{{ $policy['policyname'] }} </td>
            <td> Price : {{  $policy['p_price'] }} </td>
            <td> Claim Price : {{  $policy['c_price'] }} </td>
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
