<div>

    @include('livewire.companymodal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>List Of Companies  
                            
                        <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search Company" style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#companyModal">
                                Add New Company
                            </button>
                            
                            </h4>
                      
</div>
<div class="card-body">
    <table class = "table table-borderd table-striped">
        <thead>
            <tr>
                <th> ID</th>
                <th> Name</th>
                <th>Email </th>
                <th>Logo </th>
                <th>Website </th>
                <th>Actions</th>

               
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
            <tr>
               
            <td> {{$company->id}} </td>
            <td>  {{$company->name}}</td>
            <td>  {{$company->email}}</td>
            <td>  {{$company->logo}}</td>
            <td>   {{$company->website}}</td>
            <td>
                <button type ="button" data-bs-toggle="modal" data-bs-target="#updateCompanyModal" wire:click="editCompany({{$company->id}})" class="btn btn-primary"> Edit</button>
                <button type ="button" data-bs-toggle="modal" data-bs-target="#deleteCompanyModal" wire:click="deleteCompany({{$company->id}})" class="btn btn-danger"> Delete</a>
            </td>
               
            </tr>
            @empty
            <tr>
               
                   <td colspan="5"> No Record Found</td>
               
            </tr>
            @endforelse


        </tbody>
    </table>
    <div>
        {{$companies->links()}}
    </div>

</div>

</div>
</div>
</div>
</div>
</div>
