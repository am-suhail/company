<!-- Add Company  -->
<div wire:ignore.self class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel">Create Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveCompany">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Logo</label>
                        <input   type="file" wire:model="logo" class="form-control">
                        @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Website</label>
                        <input type="text" wire:model="website" class="form-control">
                        @error('website') <span class="text-danger">{{ $message }}</span> @enderror
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


<!-- Update Company  -->
<div wire:ignore.self class="modal fade" id="updateCompanyModal" tabindex="-1" aria-labelledby="updateCompanyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCompanyModalLabel">Edit Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="updateCompany">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Email</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
    <label>Company Logo</label>
    <input type="file" wire:model="logo" class="form-control">
    @if ($logo && !is_string($logo))
        <p>{{ $logo->getClientOriginalName() }}</p>
    @elseif (is_string($logo))
        <p>{{ $logo }}</p>
    @endif
    @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
</div>




                    <div class="mb-3">
                        <label>Company Website</label>
                        <input type="text" wire:model="website" class="form-control">
                        @error('website') <span class="text-danger">{{ $message }}</span> @enderror
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


<!-- delete Company  -->
<div wire:ignore.self class="modal fade" id="deleteCompanyModal" tabindex="-1" aria-labelledby="deleteCompanyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCompanyModalLabel">Delete Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="destroyCompany">
                <div class="modal-body">
                    <h4>Are you sure you want to delete ?</h4>
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