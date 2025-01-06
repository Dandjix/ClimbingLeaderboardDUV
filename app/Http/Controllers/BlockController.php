<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Afficher la liste des blocs.
     */
    public function index()
    {
        $blocks = Block::orderBy('name', 'asc')->get();
        return view('blocks.index', compact('blocks'));
    }

    /**
     * Afficher le formulaire de création d'un bloc.
     */
    public function create()
    {
        return view('blocks.create');
    }

    /**
     * Sauvegarder un nouveau bloc.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'difficulty' => 'required|integer',
            'description' => 'required|string',
        ]);

        Block::create($request->all());

        return redirect()->route('blocks.index')->with('success', 'Block créé avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d'un bloc.
     */
    public function edit($id)
    {
        $block = Block::findOrFail($id);
        return view('blocks.edit', compact('block'));
    }

    /**
     * Mettre à jour un bloc.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'difficulty' => 'required|integer',
            'description' => 'required|string',
        ]);

        $block = Block::findOrFail($id);
        $block->update($request->all());

        return redirect()->route('blocks.index')->with('success', 'Block mis à jour avec succès.');
    }

    /**
     * Supprimer un bloc.
     */
    public function destroy($id)
    {
        $block = Block::findOrFail($id);
        $block->delete();

        return redirect()->route('blocks.index')->with('success', 'Block supprimé avec succès.');
    }
}
