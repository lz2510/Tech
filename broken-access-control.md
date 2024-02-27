# Broken Access Control

## Description:
1. Violation of the principle of least privilege or deny by default, where access should only be granted for particular capabilities, roles, or users, but is available to anyone.
2. Accessing API with missing access controls for POST, PUT and DELETE.
3. CORS misconfiguration allows API access from unauthorized/untrusted origins.

## How to prevent

* Except for public resources, deny by default.
* Implement access control mechanisms once and re-use them throughout the application, including minimizing Cross-Origin Resource Sharing (CORS) usage.
* Disable web server directory listing and ensure file metadata (e.g., .git) and backup files are not present within web roots.
* Log access control failures, alert admins when appropriate (e.g., repeated failures).
* Rate limit API and controller access to minimize the harm from automated attack tooling.
* Stateful session identifiers should be invalidated on the server after logout. Stateless JWT tokens should rather be short-lived so that the window of opportunity for an attacker is minimized. For longer lived JWTs it's highly recommended to follow the OAuth standards to revoke access.

https://owasp.org/Top10/A01_2021-Broken_Access_Control/  
https://cwe.mitre.org/data/definitions/1345.html  

## CSRF

[CSRF](csrf.md)

## CORS

Cross-Origin Resource Sharing (CORS) is an HTTP-header based mechanism that allows a server to indicate any origins (domain, scheme, or port) other than its own from which a browser should permit loading resources. CORS also relies on a mechanism by which browsers make a "preflight" request to the server hosting the cross-origin resource, in order to check that the server will permit the actual request. In that preflight, the browser sends headers that indicate the HTTP method and headers that will be used in the actual request.

https://en.wikipedia.org/wiki/Cross-origin_resource_sharing  
https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS  

### CORS is not a vunelrubity, the question is how to make it safe.

### CORS in Laravel

Laravel can automatically respond to CORS OPTIONS HTTP requests with values that you configure. All CORS settings may be configured in your application's config/cors.php configuration file. The OPTIONS requests will automatically be handled by the HandleCors middleware that is included by default in your global middleware stack.

https://laravel.com/docs/10.x/routing#cors  

## Authorization

### Recommendations

- Enforce Least Privileges
- Deny by Default
- Validate the Permissions on Every Request
- Enforce Authorization Checks on Static Resources
- Implement Appropriate Logging

https://cheatsheetseries.owasp.org/cheatsheets/Authorization_Cheat_Sheet.html  

## Implement Security Logging and Monitoring

- Follow a common logging format and approach within the system and across systems of an organization. An example of a common logging framework is the Apache Logging Services which helps provide logging consistency between Java, PHP, .NET, and C++ applications.
- Do not log too much or too little. For example, make sure to always log the timestamp and identifying information including the source IP and user-id, but be careful not to log private or confidential data.
- Pay close attention to time syncing across nodes to ensure that timestamps are consistent.

https://owasp.org/www-project-proactive-controls/v3/en/c9-security-logging.html  
https://logging.apache.org  



