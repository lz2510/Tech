# CORS

## Description

Cross-Origin Resource Sharing (CORS) is an HTTP-header based mechanism that allows a server to indicate any origins (domain, scheme, or port) other than its own from which a browser should permit loading resources. CORS also relies on a mechanism by which browsers make a "preflight" request to the server hosting the cross-origin resource, in order to check that the server will permit the actual request. In that preflight, the browser sends headers that indicate the HTTP method and headers that will be used in the actual request.

https://en.wikipedia.org/wiki/Cross-origin_resource_sharing  
https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS  

## CORS is not a vunelrubity, the question is how to make it safe.

## CORS in Laravel

Laravel can automatically respond to CORS OPTIONS HTTP requests with values that you configure. All CORS settings may be configured in your application's config/cors.php configuration file. The OPTIONS requests will automatically be handled by the HandleCors middleware that is included by default in your global middleware stack.

Laravel uses fruitcake/php-cors to handle CORS OPTIONS HTTP requests. It's in src/Illuminate/Http/Middleware/HandleCors.php

https://laravel.com/docs/10.x/routing#cors 
https://github.com/fruitcake/php-cors/ 

## Credentialed requests and wildcards

When responding to a credentialed request:

- The server must not specify the "*" wildcard for the Access-Control-Allow-Origin response-header value, but must instead specify an explicit origin; for example: Access-Control-Allow-Origin: https://example.com
- The server must not specify the "*" wildcard for the Access-Control-Allow-Headers response-header value, but must instead specify an explicit list of header names; for example, Access-Control-Allow-Headers: X-PINGOTHER, Content-Type
- The server must not specify the "*" wildcard for the Access-Control-Allow-Methods response-header value, but must instead specify an explicit list of method names; for example, Access-Control-Allow-Methods: POST, GET
- The server must not specify the "*" wildcard for the Access-Control-Expose-Headers response-header value, but must instead specify an explicit list of header names; for example, Access-Control-Expose-Headers: Content-Encoding, Kuma-Revision
- If a request includes a credential (most commonly a Cookie header) and the response includes an Access-Control-Allow-Origin: * header (that is, with the wildcard), the browser will block access to the response, and report a CORS error in the devtools console.

But if a request does include a credential (like the Cookie header) and the response includes an actual origin rather than the wildcard (like, for example, Access-Control-Allow-Origin: https://example.com), then the browser will allow access to the response from the specified origin.

Also note that any Set-Cookie response header in a response would not set a cookie if the Access-Control-Allow-Origin value in that response is the "*" wildcard rather an actual origin.

https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/OPTIONS#examples  
