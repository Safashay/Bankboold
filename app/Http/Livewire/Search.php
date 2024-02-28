<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
class Search extends Component
{
    use WithPagination;
    public  $user;
    public  $name;
    public $show="";
    
protected $listeners = ['search','showUser'];
    
 
    public function search()
    {
        $this->user=User::where('name','like','%'.$this->name.'%')->get();
    
        $this->show= $this->user->first();
    }
    public function showUser($id)
    {
        $this->show=User::find($id);
      
    }
    
    public function mount()
    {
        $this->fill(['user' => User::all()]);
    }
    public function render()
    {   
        return view('livewire.search',['users'=>$this->user,'show'=>$this->show])
        ->extends('master.app')
        ->section('content');
    }
   
 

}
