<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCompany extends Component
{
    use WithPagination;
    use WithFileUploads;  
    protected $paginationTheme = 'bootstrap';  
    public $name, $email, $logo, $website, $company_id;
    public $search = '';
    //public $companies;
    protected $messages = [
        'logo.required' => 'The logo field is required.',
        'logo.image' => 'The logo must be an image file.',
        'logo.mimes' => 'The logo must be in JPEG, PNG, or JPG format.',
        'logo.dimensions' => 'The logo must be  100 pixels in width and 100 pixels in height.',
        'website.required' => 'The website URL is required.',
        'website.url' => 'The website must be a valid URL.',
    ];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'logo' => 'required|image|dimensions:width=100,height=100',
            'website' => 'required|string|url',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveCompany()
    {
      $validatedData = $this->validate(); 
      $logoPath = null;
      if ($this->logo) {
        $logoPath = $this->logo->store('public/logos');
    }

      Company::create(array_merge($validatedData, [
        'logo' => $logoPath,
    ]));
      session()->flash('message','Company Added Successfully');
      $this->resetInput();
      $this->dispatchBrowserEvent('close-modal');

      if ($this->logo) {
        $logoPath = $this->logo->store('public/logos');
    }
    }
    public function updateCompany()
    {
        $validatedData = $this->validate();

        Company::where('id',$this->company_id)->update([

        'name' => $validatedData ['name'],
        'email' => $validatedData ['email'],
        'logo' => $validatedData ['logo'],
        'website' => $validatedData ['website']
       ] );
       session()->flash('message','Company Updated Successfully');
      $this->resetInput();
      $this->dispatchBrowserEvent('close-modal');

    }

    public function editCompany(int $company_id)
    {
     $company = Company::find($company_id);
     if($company){
     $this->company_id = $company->id;
     $this->name = $company ->name;
     $this->email = $company ->email;
     $this->logo = $company ->logo;
     $this->website = $company ->website;
     }
     else{
        return redirect()->to('/companies');
     }
    }
    public function deleteCompany(int $company_id)
    {
        $this->company_id = $company_id;
    }

    public function destroyCompany()
{
    if ($this->company_id) {
        Company::find($this->company_id)->delete();
        session()->flash('message', 'Company Deleted Successfully');
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
        $this->reset(['name', 'email', 'logo', 'website']);

    }


    public function render()
    {
        $companies=Company::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(10);
        return view('livewire.add-company',['companies' => $companies]);
    }
}
