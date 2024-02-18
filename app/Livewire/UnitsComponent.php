<?php

namespace App\Livewire;

use App\Models\Unidade;
use Livewire\Component;
use Livewire\WithPagination;

class UnitsComponent extends Component
{
    use WithPagination;
    public $search='';
    public $Id, $nombre;

    public function render()
    {
        // if ($this->search==""){
        //     $units = Unidade::paginate(6);
        //    }else{
        //        $units = Unidade::where('nombre','like', '%'.$this->criterio.'%')->get();
        //    }
           $units = Unidade::where('nombre','like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.units-component', compact('units'));
    }

    public function store(){
        $unit = New Unidade();
        $unit->nombre = $this -> nombre;
        $unit->save();
        $this->clear();
    }

    public function clear(){
        $this->nombre='';
    }

    public function edit($id){
        $unit = Unidade::find($id);
        $this->clear();
        $this->Id = $unit->id;
        $this->nombre = $unit->nombre;
    }

    public function update($id){
        $unit = Unidade::find($id);
        $unit->nombre = $this->nombre;
        $unit->save();
        $this->clear();
    }
    
    public function delete($id){
        $unit = Unidade::find($id);
        $unit->delete();
        $this->clear();
    }
}
