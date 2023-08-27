@extends('layouts.app')

@section('content')

    <div>
        <livewire:add-employee>
    </div>

@endsection
@section('script')
<script>
window.addEventListener('close-modal', event => {
    $(#companyModal).modal('hide');
    $(#updateCompanyModal).modal('hide');
    $(#deleteCompanyModal).modal('hide');
})
</script>

@endsection