<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // Con este Resource, podemos representar la información cómo necesitemos
        return [
            'id' => $this->id,
            'nombres' => Str::upper($this->nombres),
            'apellidos' => Str::upper($this->apellidos),
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'cc' => $this->cc,
            'tipo_sangre' => $this->tipo_sangre,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'creado' => $this->created_at->format('Y-m-d H:i'),
            'modificado' => $this->updated_at->format('Y-m-d H:i')
        ];
    }

    public function with($request) {
        return [
            'res' => true,
        ];
    }
}
