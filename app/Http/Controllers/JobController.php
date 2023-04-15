<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobResource;
use App\Http\Resources\JobsListCollection;
use App\Models\Job;
use App\Services\JobService;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\InflateStream;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use ZipArchive;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class JobController extends Controller
{

    public function teste()
    {
        try {
            $url = 'https://challenges.coode.sh/food/data/json/products_01.json.gz';
            $file_path = '/tmp/products_01.json.gz';
            $decompressed_file_path = '/tmp/products_01.json';
        
            // Download the compressed file and save it to disk
            $fp = fopen($file_path, 'w');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        
            // Decompress the file and extract the first 100 lines
            $fp = gzopen($file_path, 'r');
            $out = fopen($decompressed_file_path, 'w');
            for ($i = 0; $i < 100; $i++) {
                $line = gzgets($fp);
                if ($line === false) {
                    break;
                }
                fwrite($out, $line);
            }
            gzclose($fp);
            fclose($out);

            //! outra função
            // Return the path of the new file with only the first 100 lines
            $file_path = $decompressed_file_path;
            $output_file_path = '/tmp/products_01_first_100_lines.json';
        
            // Read the first 100 lines of the file
            
            $file_lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $first_100_lines = array_slice($file_lines, 0, 2);
            foreach ($first_100_lines as $line) {
                dump(json_decode($line));
            }
            exit;
            dd(json_decode($first_100_lines[0]));
            // Write the first 100 lines to a new file
            $fp = fopen($output_file_path, 'w');
            fwrite($fp, implode(PHP_EOL, $first_100_lines));
            fclose($fp);
        
            // Return the path of the new file with only the first 100 lines
            return $output_file_path;
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function readFirst100LinesFromFile()
    {
        $file_path = $this->teste();

        // Read the contents of the file
        $contents = file_get_contents($file_path);
    
        // Parse the JSON data
        // $aux = ($contents);
        dd((($contents)));exit;
        $data = json_decode($contents, true);
        // Check if the decoded data is an array
        if (!is_array($data)) {
            throw new Exception('Failed to parse JSON data');
        }
    
        // Return the first 100 lines of data
        return array_slice($data, 0, 100);
    }

    /**
     * Create job
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validator = validate(Job::$rules, $request->all());
        $jobService = new JobService();
        $jobs = $jobService->create($validator->validated());

        return apiResponse($jobs, 'vaga de emprego cadastrada com sucesso');
    }
}
