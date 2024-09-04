<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Queue\Failed\PrunableFailedJobProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        // Redirecionamento com flash mensage
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie['nome']}' adicionada com sucesso!");
    }

    public function edit(Serie $serie)
    {
        return view('components.edit')->with('serie', $serie);
    }

    public function update(Serie $serie, Request $request)
    {
        
        $serie->nome = $request->nome;
        $serie->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie['nome']}' atualizada com sucesso!");
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie['nome']}' removida com sucesso!");
    }
}
