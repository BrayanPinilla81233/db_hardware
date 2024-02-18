<?php

namespace App\Livewire;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsComponent extends Component
{
    use WithPagination;
    public $search='';
    public $Id, $nombre;

    public function render()
    {
        // if ($this->search==""){
        //     $brands = Marca::paginate(6);
        //    }else{
        //        $brands = Marca::where('nombre','like', '%'.$this->search.'%')->get();
        //    }
        $brands = Marca::where('nombre','like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.brands-component', compact('brands'));
    }

    public function store(){
        $brand = New Marca();
        $brand->nombre = $this -> nombre;
        $brand->save();
        $this->clear();
    }

    public function clear(){
        $this->nombre='';
    }

    public function edit($id){
        $brand = Marca::find($id);
        $this->clear();
        $this->Id = $brand->id;
        $this->nombre = $brand->nombre;
    }

    public function update($id){
        $brand = Marca::find($id);
        $brand->nombre = $this->nombre;
        $brand->save();
        $this->clear();
    }
    
    public function delete($id){
        $brand = Marca::find($id);
        $brand->delete();
        $this->clear();
    }
}
