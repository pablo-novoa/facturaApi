<?php

namespace App\Http\Middleware;

use Closure;
use \Auth0\SDK\JWTVerifier;
use \Auth0\SDK\Exception;

class oAuth0
{

    
    public function handle($request, Closure $next)
    {

     /* CORS stuff
      */
       /* header('Access-Control-Allow-Origin: http://localhost:9000');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Credentials: true");
        */

        header('Access-Control-Allow-Origin: http://localhost:9000');
        header('Access-Control-Allow-Credentials: true');
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          // return only the headers and not the content
          // only allow CORS if we're doing a GET - i.e. no saving for now.
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET') {
          }
            header('Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type, Accept');
          exit;
        }

            header('Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type, Accept');


        $client_id = 'hb048Whxrcdt0aoSYTeuElCU0p2voyQ0';
        $client_secret =  base64_encode('SGOKHTo5cbE8HYxVGoY9r_wHFZslNhE97hHTW32Mk0UBR0h57TjKlwSyyZSp3jQG');

        $authorizationHeader = $request->header('Authorization');
        

        if ($authorizationHeader == null) {
          return response()->json(['error' => "No authorization header sent"], 418);
        }

        $jwt = str_replace('Bearer ', '', $authorizationHeader);


        $verifier = new JWTVerifier([
            'valid_audiences' => [$client_id],
            'client_secret' => $client_secret
        ]);

        $decoded_token = null;
        
       try {
        
          $decoded_token = $verifier->verifyAndDecode($jwt);

          return $next($request);

        } catch(Exception\CoreException $e) {
           return response()->json(['error' => "Invalid token"], 401);
        }


    }
}
