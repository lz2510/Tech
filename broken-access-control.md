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
3. If an API-driven site can't use <form> tags, consider using custom request headers.
4. SameSite Cookie Attribute can be used for session cookies but be careful to NOT set a cookie specifically for a domain. This action introduces a security vulnerability because all subdomains of that domain will share the cookie, and this is particularly an issue if a subdomain has a CNAME to domains not in your control.
5. User Interaction-Based CSRF Defense. Like login to platform to grant. OAuth2

#### SameSite (Cookie Attribute)¶

SameSite is a cookie attribute (similar to HTTPOnly, Secure etc.) which aims to mitigate CSRF attacks. It is defined in RFC6265bis. This attribute helps the browser decide whether to send cookies along with cross-site requests. Possible values for this attribute are Lax, Strict, or None.

The Strict value will prevent the cookie from being sent by the browser to the target site in all cross-site browsing context, even when following a regular link. For example, if a GitHub-like website uses the Strict value, a logged-in GitHub user who tries to follow a link to a private GitHub project posted on a corporate discussion forum or email, the user will not be able to access the project because GitHub will not receive a session cookie. Since a bank website would not allow any transactional pages to be linked from external sites, so the Strict flag would be most appropriate for banks.

If a website wants to maintain a user's logged-in session after the user arrives from an external link, SameSite's default Lax value provides a reasonable balance between security and usability. If the GitHub scenario above uses a Lax value instead, the session cookie would be allowed when following a regular link from an external website while blocking it in CSRF-prone request methods such as POST. Only cross-site-requests that are allowed in Lax mode have top-level navigations and use safe HTTP methods.

For more details on the SameSite values, check the following section from the rfc.

Example of cookies using this attribute:

    Set-Cookie: JSESSIONID=xxxxx; SameSite=Strict
    Set-Cookie: JSESSIONID=xxxxx; SameSite=Lax

#### Using Standard Headers to Verify Origin¶

There are two steps to this mitigation method, both of which examine an HTTP request header value:

- Determine the origin that the request is coming from (source origin). Can be done via Origin or Referer headers.
- Determining the origin that the request is going to (target origin).

##### Identifying the Target Origin

Generally, it's not always easy to determine the target origin. You are not always able to simply grab the target origin (i.e., its hostname and port #) from the URL in the request, because the application server is frequently sitting behind one or more proxies. This means that the original URL can be different from the URL the app server actually receives. However, if your application server is directly accessed by its users, then using the origin in the URL is fine and you're all set.

If you are behind a proxy, there are a number of options to consider.

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



