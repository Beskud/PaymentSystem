<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class paypal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:p';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


       $c =  base64_encode("AY5T9HLmpokPYEpkgelgnPXgxUdSySak6udtjVmXTl6Y65R84HVdK4WKm8B08nEyF3ls6GUQ0UOkkZmt:=EI4wShazOiRZz-9sK0qgFQ76m2ApB4RU-CnSd85Y8ihRHjwSU7exmembwgXeej_M8Xqr2ZEEqL8tsWxK");
        dd($c);
        // curl -v -X POST "https://api-m.sandbox.paypal.com/v1/oauth2/token"    -u "QVk1VDlITG1wb2tQWUVwa2dlbGduUFhneFVkU3lTYWs2dWR0alZtWFRsNlk2NVI4NEhWZEs0V0ttOEIwOG5FeUYzbHM2R1VRMFVPa2tabXQ6PUVJNHdTaGF6T2lSWnotOXNLMHFnRlE3Nm0yQXBCNFJVLUNuU2Q4NVk4aWhSSGp3U1U3ZXhtZW1id2dYZWVqX004WHFyMlpFRXFMOHRzV3hL"    -H "Content-Type: application/x-www-form-urlencoded"    -d "grant_type=client_credentials"

        // curl -v -X POST "https://api-m.sandbox.paypal.com/v1/oauth2/token"    
        // -u "<CLIENT_ID>:<CLIENT_SECRET>"    
        // -H "Content-Type: application/x-www-form-urlencoded"  
        // -d "grant_type=client_credentials"
        


        $client = new Client();
        $res = $client->request('POST', 'https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ]);

    }
}
