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

[CORS](cors.md)

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



