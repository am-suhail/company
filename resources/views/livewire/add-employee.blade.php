<div>

    @include('livewire.employeemodal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>List Of Employees 
                            
                        <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search Employee" style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#employeeModal">
                                Add New Employee
                            </button>
                            
                            </h4>
                      
</div>
<div class="card-body">
<table class = "table table-borderd table-striped">
        <thead>
            <tr>
                <th> ID</th>
                <th> First Name</th>
                <th> Last Name</th>
                <th> Gender</th>
                <th> Mobile</th>
                <th> Email</th>
                <th>Company </th>
                <th>Status </th>
              <th>Actions</th>

               
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr>
               
            <td> {{$employee->id}} </td>
            <td>  {{$employee->first_name}}</td>
            <td>  {{$employee->last_name}}</td>
            <td>  {{$employee->gender}}</td>
            <td>  {{$employee->mobile}}</td>
            <td>  {{$employee->email}}</td>
            <td>  {{$employee->company->name}}</td>
            <td> {{$statusLabels[$employee->status]}} </td>

            <td>
                <button type ="button" data-bs-toggle="modal" data-bs-target="#updateEmployeeModal" wire:click="editEmployee({{$employee->id}})" class="btn btn-primary"> Edit</button>
                <button type ="button" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal" wire:click="deleteEmployee({{$employee->id}})" class="btn btn-danger"> Delete</button>
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
        {{ $employees->links() }}
    </div>
   

</div>

</div>
</div>
</div>
</div>
</div>
