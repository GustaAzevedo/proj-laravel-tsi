<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
	/*
	Essa é uma forma de controlar o acesso

	public function __construct()
	{
		$this->middleware('auth');
	}
	*/

    public function listar()
    {
    	$clientes = Cliente::all();

    	return view('clientes.listar', ['clientes' => $clientes]);
    }
}
