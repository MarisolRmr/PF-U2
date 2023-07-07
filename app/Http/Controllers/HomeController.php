<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\EmpresaEmisora;
use App\Models\EmpresaReceptora;

class HomeController extends Controller
{

    public function home()
    {
        // Le pasamos toda las facturas que se tengan
        $facturas = Factura::all();
        // Le pasamos las empresas emisoras que se tengan
        $empresasEmisoras = EmpresaEmisora::all();
        // Le pasamos las empresas receptoras que se tengan
        $empresasReceptoras = EmpresaReceptora::all();

        return view('dashboard', compact('facturas', 'empresasEmisoras', 'empresasReceptoras'));
    }

    // funcion para buscar una factura
    public function buscar(Request $request)
    {
        // Validación de campos
        $request->validate([
            'rfc_emisor' => 'required',
            'rfc_receptor' => 'required',
            'folio_factura' => 'required',
        ]);

        // Obtener los valores de los campos del formulario
        $id_emisora = $request->input('rfc_emisor');
        $id_receptora = $request->input('rfc_receptor');
        $id_folio = $request->input('folio_factura');

        // Buscar la factura en la base de datos
        $facturaEncontrada = Factura::where('empresa_emisora_id', $id_emisora)
            ->where('empresa_receptora_id', $id_receptora)
            ->where('id', $id_folio)
            ->first();

        if ($facturaEncontrada) {
            // Factura encontrada, mostrar mensaje de éxito
            session()->flash('success', $facturaEncontrada->id);
        } else {
            // Factura no encontrada, mostrar mensaje de error
            session()->flash('error');
        }

        return redirect()->route('home')->withInput();
    }
}
