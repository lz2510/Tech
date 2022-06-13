# http

## http status code

A status code in the 200-299 range means that the server got your request and has processed your request (or in the process of working through your request in the background) and sending back a signal that everything has worked out so far. The most common in this series are a 200 meaning a GET request has been successful and a 201 that a POST/PATCH/UPDATE request has been processed.

A 300-399 status code means that the client needs to do additional work to have its request completed. This is usually in the form of being redirected to a new server because the server you’ve tried sending the request to has better/alternate information about another URL to handle your request. The most commonly used are 301 and 302. A 301 is a permanent redirect, signalling that the server will no longer handle this kind of request. A 302 is a temporary redirect and the server can try this type of request in the future. In both cases, the server will send a new URL for the client to connect to. 301 status codes are most often used to update search engine data. Bonus points for knowing that a temporary redirect was not the intended purpose for the 302 status code, and 303 and 307 should be used instead.

A status code in the 400-499 range effectively means the user has caused an error condition and the request needs to be corrected before the server can successfully process it. The most common, of course is a 404 meaning the resource could not be found. Other popular ones include 400 meaning a payload of data was bad, 401 meaning the user is not authorized, and a 403 which means the request looked okay but the resource is forbidden. Rate limiting often happens with a 429. Bonus points for knowing that a 418 status code means “I’m a little teapot” and was introduced as an April Fool’s joke.

Any status code in the 500-599 range generally means that the HTTP request looked valid and all other conditions passed (authorized, not forbidden, etc), but that something has caused an error on the server. By far, the most common is the generic 500 status message meaning no other more-specific error message could be presented. Other common codes in this range are 504 for timeouts and 503 for a temporary outage.

200 get successfully  
201 post successfully

https://stackoverflow.com/questions/1860645/create-request-with-post-which-response-codes-200-or-201-and-content

## restful

## What is the difference between HTTP and HTTPS?

HTTP runs beyond the TCP and transfers the content with plaintext. Both client and server sides cannot verify each other’s identity.
HTTPS (Hypertext Transfer Protocol Secure) is the HTTP that runs beyond SSL/TLS, which SSL/TLS running beyond the TCP. All the content transferred is encrypted.
Hence, the security of HTTPS is higher than HTTP, but HTTPS requires more resources than HTTP.

### ref
https://towardsdatascience.com/all-you-should-know-about-computer-network-in-technical-interviews-5478f45368ac
