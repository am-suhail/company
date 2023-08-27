<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AddEmployee extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 
    public $search = '';

    public $first_name, $last_name, $gender, $mobile, $email, $company, $status;
    public $companies = [];
    public $statusLabels = [
        'active' => 'Active',
        'resigned' => 'Resigned',
        'suspended' => 'Suspended',
    ];
    

    protected $messages = [
        
    ];


    protected function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'nullable|string',
            'mobile' => 'required|string',
            'email' => 'nullable|email',
            'company' => 'required|exists:companies,id', 
            'status' => 'required|in:active,resigned,suspended',
        ];
    }

    public function mount()
    {
        $this->companies = Company::pluck('name', 'id')->toArray();
        $this->statusLabels = array_map(function ($status) {
            return ucwords($status);
        }, array_combine(array_keys($this->statusLabels), array_values($this->statusLabels)));
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveEmployee()
    {
        $validatedData = $this->validate();

        Employee::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'company_id' => $this->company,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Employee Added Successfully');

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function updateEmployee()
    {
        $validatedData = $this->validate();
    
        Employee::where('id', $this->employee_id)->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'mobile' => $validatedData['mobile'],
            'email' => $validatedData['email'],
            'company_id' => $this->company, 
            'status' => $this->status, 
        ]);
    
        session()->flash('message', 'Employee Updated Successfully');
    
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    

    public function editEmployee(int $employee_Id)
{
    $employee = Employee::find($employee_Id);
    if($employee)
{
    $this->employee_id = $employee->id;
    $this->first_name = $employee->first_name;
    $this->last_name = $employee->last_name;
    $this->gender = $employee->gender;
    $this->mobile = $employee->mobile;
    $this->email = $employee->email;
    $this->company = $employee->company_id;
    $this->status = $employee->status;
}


    
    else{
        return redirect()->to('/employees');
     }
}

public function deleteEmployee(int $employee_id)
{
    $this->employee_id = $employee_id;
}

public function destroyEmployee()
{
    if ($this->employee_id) {
        Employee::find($this->employee_id)->delete();
        session()->flash('message', 'Employee Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    } else {
        
        session()->flash('error', 'Invalid operation. Please try again.');
    }
}




    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset([
            'first_name', 'last_name', 'gender', 'mobile', 'email', 'company', 'status'
        ]);
    }

    public function render()
    {
        $employees=Employee::where('first_name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        return view('livewire.add-employee',['employees' => $employees]);
    }
}


