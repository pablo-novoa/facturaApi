<?php

namespace App\Http\Middleware;

use Closure;
use \Auth0\SDK\JWTVerifier;
use \Auth0\SDK\Exception;

class oAuth0
{

    
    public function handle($request, Closure $next)
    {
        $client_id = 'hb048Whxrcdt0aoSYTeuElCU0p2voyQ0';
        $client_secret =  base64_encode('SGOKHTo5cbE8HYxVGoY9r_wHFZslNhE97hHTW32Mk0UBR0h57TjKlwSyyZSp3jQG');

        $authorizationHeader = $request->header('Authorization');

        if ($authorizationHeader == null) {
          return response()->json(['error' => "No authorization header sent"], 418)
                  ->header('Access-Control-Allow-Origin', '*')
                  ->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE')
                  ->header('Access-Control-Allow-Headers', 'Accept, Content-Type,X-CSRF-TOKEN,Authorization')
                  ->header('Access-Control-Allow-Credentials', 'true');
        }


        $jwt = str_replace('Bearer ', '', $authorizationHeader);

        $verifier = new JWTVerifier([
            'valid_audiences' => [$client_id],
            'client_secret' => $client_secret
        ]);

        $decoded_token = null;
        
       try {
        
          $decoded_token = $verifier->verifyAndDecode($jwt);

          return $next($request)
                  ->header('Access-Control-Allow-Origin', '*')
                  ->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE')
                  ->header('Access-Control-Allow-Headers', 'Accept, Content-Type,X-CSRF-TOKEN,Authorization')
                  ->header('Access-Control-Allow-Credentials', 'true');

        } catch(Exception\CoreException $e) {
           return response()->json(['error' => "Invalid token"], 401);
        }

    



    }
}
