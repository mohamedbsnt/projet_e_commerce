<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneticAlgorithmController extends Controller
{
    public function show()
    {
        return view('pages.ai_shopify_store', [
            'originalImageUrl' => null,
            'optimizedImageUrl' => null,
            'bestParams' => null,
        ]);
    }

    public function optimize(Request $request)
    {
        // DEBUG 1 : vérifier les données reçues
        \Log::info('Requête reçue', [
            'has_file' => $request->hasFile('input_image'),
            'files' => $request->file(),
            'all_inputs' => $request->all(),
        ]);

        $request->validate([
            'input_image' => 'required|image|max:4096',
        ]);

        // DEBUG 2 : vérifier le fichier
        if (!$request->hasFile('input_image')) {
            \Log::error('Aucun fichier input_image trouvé');
            return back()->withErrors(['error' => 'Aucun fichier reçu.']);
        }

        $image = $request->file('input_image');
        \Log::info('Fichier reçu', [
            'original_name' => $image->getClientOriginalName(),
            'size' => $image->getSize(),
            'mime' => $image->getMimeType(),
        ]);

        try {
            // Sauvegarder l'image
            $inputPath = $image->store('uploads', 'public');
            $inputFullPath = storage_path('app/public/' . $inputPath);

            \Log::info('Fichier sauvegardé', [
                'relative_path' => $inputPath,
                'absolute_path' => $inputFullPath,
                'file_exists' => file_exists($inputFullPath),
            ]);

            // Chemin du script Python
            $scriptPath = storage_path('app/scripts/optimize_grid.py');
            $outputPath = storage_path('app/public/uploads/optimized_' . uniqid() . '.png');

            \Log::info('Chemins pour Python', [
                'script' => $scriptPath,
                'output' => $outputPath,
            ]);

            // Exécuter Python
            $command = "python \"$scriptPath\" \"$inputFullPath\" \"$outputPath\"";
            exec($command, $output, $returnCode);

            \Log::info('Exécution Python', [
                'return_code' => $returnCode,
                'output' => $output,
            ]);

            if ($returnCode !== 0) {
                return back()->withErrors(['error' => 'Erreur Python: ' . implode(' ', $output)]);
            }

            $bestParamsPath = storage_path('app/public/best_grid_params.json');
            $bestParams = file_exists($bestParamsPath) 
                ? json_decode(file_get_contents($bestParamsPath), true) 
                : null;

            return view('pages.ai_shopify_store', [
                'originalImageUrl' => Storage::url($inputPath),
                'optimizedImageUrl' => Storage::url('uploads/optimized_' . uniqid() . '.png'),
                'bestParams' => $bestParams,
            ]);

        } catch (\Exception $e) {
            \Log::error('Exception', ['message' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Erreur: ' . $e->getMessage()]);
        }
    }
}
