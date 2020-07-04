<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Imgur;
//testes
// use Google\Cloud\Vision\VisionClient;
// use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Algorithmia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function analisarImagem(Request $requisicao)
    {
        // $dados = $requisicao->all();
        
        // // FUncionou
        // $client = Algorithmia::client("simkPIhS8eITgnu4bo4LaCz68331");
        // $dir = $client->dir("data://my/imgs");
        // if(!$dir->exists()) {
        //     $dir->create();
        // }
        // $file = $dir->file("img.jpg");
        // $file->putFile($dados['img']);

        // $input = json_decode('{
        //     "images": ["data://my/imgs/img.jpg"]
        //     }');

        // $algo = $client->algo("deeplearning/ObjectDetectionCOCO/0.3.0");
        // $algo->setOptions(["timeout" => 300]); //optional
        // return response()->json($algo->pipe($input)->result, 200);

        // Os dados estão sendo retornados como estáticos nesse protótipo pq ainda é necessário
        // treinar uma IA para reconhecer tais objetos
        return response()->json(
            [
                ['object' => 'capacete', 'type' => 'epi', 'consistency' => 0.89546],
                ['object' => 'bota', 'type' => 'epi', 'consistency' => 0.76215],
                ['object' => 'protetor_auricular', 'type' => 'epi', 'consistency' => 0.92589],
                ['object' => 'serradeira', 'type' => 'maquinario', 'consistency' => 0.94972]
            ]
        );
    }

    // REQUER ATIVAR A OPCAO DE FATURAMENTO NO CLOUD GOOGLE API!!!!!
    // public function test()
    // {
    //     $path = 'img.png';

    //     $imageAnnotator = new ImageAnnotatorClient([
    //         'credentials' => 'auth.json',
    //     ]);

    //     $image = file_get_contents($path);
        
    //     # performs label detection on the image file
    //     $response = $imageAnnotator->labelDetection($image);
    //     $labels = $response->getLabelAnnotations();

    //     if ($labels) {
    //         echo("Labels:" . PHP_EOL);
    //         foreach ($labels as $label) {
    //             echo($label->getDescription() . PHP_EOL);
    //         }
    //     } else {
    //         echo('No label found' . PHP_EOL);
    //     }
    // }

}
