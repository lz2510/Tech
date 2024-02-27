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

### Description

CSRF belongs to broken access control.

Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute unwanted actions on a web application in which they’re currently authenticated. With a little help of social engineering (such as sending a link via email or chat), an attacker may trick the users of a web application into executing actions of the attacker’s choosing. If the victim is a normal user, a successful CSRF attack can force the user to perform state changing requests like transferring funds, changing their email address, and so forth. If the victim is an administrative account, CSRF can compromise the entire web application.

The target site cannot distinguish between a legitimate request and a forged one, and may perform actions on behalf of the user, such as changing their password, transferring funds, or deleting data.

https://cwe.mitre.org/data/definitions/352.html  
https://owasp.org/www-community/attacks/csrf  
https://owasp.org/Top10/A01_2021-Broken_Access_Control/  
https://www.linkedin.com/advice/0/how-do-you-compare-contrast-csrf-xss-terms  

### How to prevent

IMPORTANT: Remember that Cross-Site Scripting (XSS) can defeat all CSRF mitigation techniques!

1. See the OWASP XSS Prevention Cheat Sheet for detailed guidance on how to prevent XSS flaws.
2. First, check if your framework has built-in CSRF protection and use it
3. If an API-driven site can't use \<form\> tags, consider using custom request headers.
4. SameSite Cookie Attribute can be used for session cookies but be careful to NOT set a cookie specifically for a domain. This action introduces a security vulnerability because all subdomains of that domain will share the cookie, and this is particularly an issue if a subdomain has a CNAME to domains not in your control.
5. User Interaction-Based CSRF Defense. Like login to platform to grant. OAuth2
6. Do not use GET requests for state changing operations.

#### Defense In Depth Techniques

##### SameSite (Cookie Attribute)

SameSite is a cookie attribute (similar to HTTPOnly, Secure etc.) which aims to mitigate CSRF attacks. It is defined in RFC6265bis. This attribute helps the browser decide whether to send cookies along with cross-site requests. Possible values for this attribute are Lax, Strict, or None.

The Strict value will prevent the cookie from being sent by the browser to the target site in all cross-site browsing context, even when following a regular link. For example, if a GitHub-like website uses the Strict value, a logged-in GitHub user who tries to follow a link to a private GitHub project posted on a corporate discussion forum or email, the user will not be able to access the project because GitHub will not receive a session cookie. Since a bank website would not allow any transactional pages to be linked from external sites, so the Strict flag would be most appropriate for banks.

If a website wants to maintain a user's logged-in session after the user arrives from an external link, SameSite's default Lax value provides a reasonable balance between security and usability. If the GitHub scenario above uses a Lax value instead, the session cookie would be allowed when following a regular link from an external website while blocking it in CSRF-prone request methods such as POST. Only cross-site-requests that are allowed in Lax mode have top-level navigations and use safe HTTP methods.

For more details on the SameSite values, check the following section from the rfc.

Example of cookies using this attribute:

    Set-Cookie: JSESSIONID=xxxxx; SameSite=Strict
    Set-Cookie: JSESSIONID=xxxxx; SameSite=Lax

##### Using Standard Headers to Verify Origin

There are two steps to this mitigation method, both of which examine an HTTP request header value:

- Determine the origin that the request is coming from (source origin). Can be done via Origin or Referer headers.
- Determining the origin that the request is going to (target origin).

At server-side, we verify if both of them match. If they do, we accept the request as legitimate (meaning it's the same origin request) and if they don't, we discard the request (meaning that the request originated from cross-domain). Reliability on these headers comes from the fact that they cannot be altered programmatically as they fall under forbidden headers list, meaning that only the browser can set them.

###### Identifying Source Origin (via Origin/Referer Header)

###### CHECKING THE ORIGIN HEADER

If the Origin header is present, verify that its value matches the target origin. Unlike the referer, the Origin header will be present in HTTP requests that originate from an HTTPS URL.

###### CHECKING THE REFERER HEADER IF ORIGIN HEADER IS NOT PRESENT

If the Origin header is not present, verify that the hostname in the Referer header matches the target origin. This method of CSRF mitigation is also commonly used with unauthenticated requests, such as requests made prior to establishing a session state, which is required to keep track of a synchronization token.

In both cases, make sure the target origin check is strong. For example, if your site is example.org make sure example.org.attacker.com does not pass your origin check (i.e, match through the trailing / after the origin to make sure you are matching against the entire origin).

If neither of these headers are present, you can either accept or block the request. We recommend blocking. Alternatively, you might want to log all such instances, monitor their use cases/behavior, and then start blocking requests only after you get enough confidence.

###### Identifying the Target Origin

Generally, it's not always easy to determine the target origin. You are not always able to simply grab the target origin (i.e., its hostname and port #) from the URL in the request, because the application server is frequently sitting behind one or more proxies. This means that the original URL can be different from the URL the app server actually receives. However, if your application server is directly accessed by its users, then using the origin in the URL is fine and you're all set.

If you are behind a proxy, there are a number of options to consider.

**Configure your application to simply know its target origin**: Since it is your application, you can find its target origin and set that value in some server configuration entry. This would be the most secure approach as its defined server side, so it is a trusted value. However, this might be problematic to maintain if your application is deployed in many places, e.g., dev, test, QA, production, and possibly multiple production instances. Setting the correct value for each of these situations might be difficult, but if you can do it via some central configuration and provide your instances the ability to grab the value from it, that's great! (Note: Make sure the centralized configuration store is maintained securely because major part of your CSRF defense depends on it.)

**Use the Host header value**: If you want your application to find its own target so it doesn't have to be configured for each deployed instance, we recommend using the Host family of headers. The Host header is meant to contain the target origin of the request. But, if your app server is sitting behind a proxy, the Host header value is most likely changed by the proxy to the target origin of the URL behind the proxy, which is different than the original URL. This modified Host header origin won't match the source origin in the original Origin or Referer headers.

**Use the X-Forwarded-Host header value**: To avoid the possibility that the proxy will alter the host header, you can use another header called X-Forwarded-Host to contain the original Host header value the proxy received. Most proxies will pass along the original Host header value in the X-Forwarded-Host header. So the value in X-Forwarded-Host is likely to be the target origin value that you need to compare to the source origin in the Origin or Referer header.

##### Using Cookies with Host Prefixes to Identify Origins¶

Another solution for this problem is using Cookie Prefixes for cookies with CSRF tokens. If cookies have __Host- prefixes e.g. Set-Cookie: __Host-token=RANDOM; path=/; Secure then each cookie:

- Cannot be (over)written from another subdomain.
- Must have the path of /.
- Must be marked as Secure (i.e, cannot be sent over unencrypted HTTP).

https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html  

### CSRF vs XSS

#### How are CSRF and XSS different?

CSRF and XSS are different in several ways. First, CSRF relies on the user's browser to send a request to the target site, while XSS relies on the user's browser to execute code from the attacker's site. Second, CSRF does not require the attacker to compromise the target site, while XSS does. Third, CSRF does not affect the user's browser directly, while XSS does. 

#### How are CSRF and XSS similar?

CSRF and XSS are similar in some ways. First, both attacks aim to exploit the user's trust and session with the target site. Second, both attacks can cause serious damage to the user's data and privacy, as well as the reputation and functionality of the target site. Third, both attacks can be performed by sending a link or an email to the user, or embedding the malicious code or request in a third-party site or application.

https://www.linkedin.com/advice/0/how-do-you-compare-contrast-csrf-xss-terms  

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



