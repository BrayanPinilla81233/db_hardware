<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesComponent extends Component
{
    use WithPagination;
    public $search='';
    public $Id, $nombre;

    public function render()
    {   
        // if ($this->search==""){
        //  $categories = Categoria::paginate(6);
        // }else{
        //     $categories = Categoria::where('nombre','like', '%'.$this->search.'%')->get();
        // }
        $categories = Categoria::where('nombre','like', '%'.$this->search.'%')->paginate(5);
        return view('livewire.categories-component', compact('categories'));
    }

    public function store(){
        $categories = New Categoria();
        $categories->nombre = $this -> nombre;
        $categories->save();
        $this->clear();
    }

    public function clear(){
        $this->nombre='';
    }

    public function edit($id){
        $categories = Categoria::find($id);
        $this->clear();
        $this->Id = $categories->id;
        $this->nombre = $categories->nombre;
    }

    public function update($id){
        $categories = Categoria::find($id);
        $categories->nombre = $this->nombre;
        $categories->save();
        $this->clear();
    }
    
    public function delete($id){
        $categories = Categoria::find($id);
        $categories->delete();
        $this->clear();
    }
}
