<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $tipo;
    public $mensaje;

    public function __construct($tipo, $mensaje)
    {
        $this->tipo = $tipo;
        $this->mensaje = $mensaje;
    }

    public function render()
    {
        return view('components.alert');
    }
}
