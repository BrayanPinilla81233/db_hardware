<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Productos;
use Unidades;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtervalue = $request->input('filtervalue');
        
        $productos = Producto::query()
            ->when($filtervalue, function($query) use ($filtervalue) {
                return $query->where('nombre','like','%'.$filtervalue.'%');
            })
            ->orWhere('descripcion','like','%'.$filtervalue.'%')
            ->orWhere('referencia_fabrica','like','%'.$filtervalue.'%')
            ->orWhere('estado',$filtervalue)
            ->orWhere('clasificación_tributaria',$filtervalue)
            ->orWhereHas('categoria', function($query) use ($filtervalue){
                if($filtervalue){
                    return $query->where('nombre',$filtervalue);
                }
            })
            ->orWhereHas('marca', function($query) use ($filtervalue){
                if($filtervalue){
                    return $query->where('nombre',$filtervalue);
                }
            })
            ->orWhereHas('unidade', function($query) use ($filtervalue){
                if($filtervalue){
                    return $query->where('nombre',$filtervalue);
                }
            })->paginate(3);   
        // $productFilter = Producto::where('nombre','like','%'.$filtervalue.'%');

        // $productos = $productFilter->paginate(2);
        return view('producto.index',[
            'productos' => $productos,
        ])->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias = Categoria::pluck('nombre','id');
        $marcas = Marca::pluck('nombre','id');
        $unidades = Unidade::pluck('nombre','id');
        return view('producto.create', compact('producto', 'categorias','marcas','unidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpg,png,jpeg',
        ];
        $mensaje=[
            'required'=>'Los :attribute son requeridos',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except('_token');

        if($request->hasFile('foto')){
            $datosProducto['foto']=$request->file('foto')->store('products','public');
        }
        Producto::create($datosProducto);
        return redirect('productos')->with('mensaje','Proveedor agregado con éxito' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::pluck('nombre','id');
        $marcas = Marca::pluck('nombre','id');
        $unidades = Unidade::pluck('nombre','id');

        return view('producto.edit', compact('producto','categorias','marcas','unidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        if ($request->hasFile('foto')) {
            $campos=['foto'=>'nullable|max:10000|mimes:jpg,png,jpeg'];
        }

        $mensaje=[
            'required'=>'Los :attribute son requeridos',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto=request()->except(['_token','_method']);

        if ($request->hasFile('foto')) {
            $producto = Producto::findOrFail($id);
            Storage::delete('public/'.$producto->foto);
            $datosProducto['foto']=$request->file('foto')->store('products','public');
        }

        // if ($request->hasFile('foto')) {
        //     File::delete(public_path('storage/'. $producto->foto ));
        //     $foto = $request['foto']->store('products','public');
        // }else{
        //     $foto = $producto->foto;
        // }

        // $producto->foto = $foto;
        
        Producto::where('id','=',$id)->update($datosProducto);

        return redirect('productos')->with('mensaje','Producto Modificado' );
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}