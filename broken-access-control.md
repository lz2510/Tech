## Broken Access Control

### Description:
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

### CSRF

CSRF belonds to broken access control.

Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute unwanted actions on a web application in which they’re currently authenticated. With a little help of social engineering (such as sending a link via email or chat), an attacker may trick the users of a web application into executing actions of the attacker’s choosing. If the victim is a normal user, a successful CSRF attack can force the user to perform state changing requests like transferring funds, changing their email address, and so forth. If the victim is an administrative account, CSRF can compromise the entire web application.

https://cwe.mitre.org/data/definitions/352.html  
https://owasp.org/www-community/attacks/csrf  
https://owasp.org/Top10/A01_2021-Broken_Access_Control/  
https://cwe.mitre.org/data/definitions/1345.html  

### CSRF vs XSS

CSRF and XSS are different in several ways. First, CSRF relies on the user's browser to send a request to the target site, while XSS relies on the user's browser to execute code from the attacker's site. Second, CSRF does not require the attacker to compromise the target site, while XSS does.

https://www.linkedin.com/advice/0/how-do-you-compare-contrast-csrf-xss-terms#:~:text=CSRF%20and%20XSS%20are%20different,target%20site%2C%20while%20XSS%20does.  

### CORS

https://en.wikipedia.org/wiki/Cross-origin_resource_sharing
https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
