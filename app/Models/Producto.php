<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $id_producto
 * @property $nombre
 * @property $descripcion
 * @property $referencia_fabrica
 * @property $clasificación_tributaria
 * @property $foto
 * @property $estado
 * @property $categoria_id
 * @property $marca_id
 * @property $unidades_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Marca $marca
 * @property Unidade $unidade
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'id_producto' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'referencia_fabrica' => 'required',
		'clasificación_tributaria' => 'required',
		'foto',
        'stock' => 'required',
		'estado' => 'required',
		'categoria_id' => 'required',
		'marca_id' => 'required',
		'unidades_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_producto',
        'nombre',
        'descripcion',
        'referencia_fabrica',
        'clasificación_tributaria',
        'foto',
        'stock',
        'estado',
        'categoria_id',
        'marca_id',
        'unidades_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidade()
    {
        return $this->hasOne('App\Models\Unidade', 'id', 'unidades_id');
    }
    

}
