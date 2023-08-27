<!-- Add Employee  -->
<div wire:ignore.self class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Create Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveEmployee">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" wire:model="first_name" class="form-control">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" wire:model="last_name" class="form-control">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <select wire:model="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" wire:model="mobile" class="form-control">
                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
    <label>Company</label>
    <select wire:model="company" class="form-control">
        <option value="">Select a company</option>
        @foreach ($companies as $companyId => $companyName)
            <option value="{{ $companyId }}">{{ $companyName }}</option>
        @endforeach
    </select>
    @error('company') <span class="text-danger">{{ $message }}</span> @enderror
</div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select wire:model="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="resigned">Resigned</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Update Employee  -->
<div wire:ignore.self class="modal fade" id="updateEmployeeModal" tabindex="-1" aria-labelledby="updateEmployeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="updateEmployee">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" wire:model="first_name" class="form-control">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" wire:model="last_name" class="form-control">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <select wire:model="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" wire:model="mobile" class="form-control">
                        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
    <label>Company</label>
    <select wire:model="company" class="form-control">
        <option value="">Select a company</option>
        @foreach ($companies as $companyId => $companyName)
            <option value="{{ $companyId }}">{{ $companyName }}</option>
        @endforeach
    </select>
    @error('company') <span class="text-danger">{{ $message }}</span> @enderror
</div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select wire:model="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="resigned">Resigned</option>
                            <option value="suspended">Suspended</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- delete employee  -->
<div wire:ignore.self class="modal fade" id="deleteEmployeeModal" tabindex="-1" aria-labelledby="deleteEmployeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="destroyEmployee">
                <div class="modal-body">
                    <h4>Are you sure you want to delete?</h4>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
