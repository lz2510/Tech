# Security

## resources

Security: OWASP Top 10, SANS CWE Top 25

https://owasp.org/www-project-top-ten/  
https://www.sans.org/top25-software-errors/  
https://cwe.mitre.org/top25/index.html  

## Top 10 Web Application Security Risks

![image](https://github.com/lz2510/Tech/assets/1209204/43469836-cdd7-420c-bbc1-b316bbd0aa84)

https://owasp.org/www-project-top-ten/

## Injection

[Injection](injection.md)

## Broken Access Control

[Broken Access Control](broken-access-control.md)

## Cryptographic Failures

Notable Common Weakness Enumerations (CWEs) included are CWE-259: Use of Hard-coded Password, CWE-327: Broken or Risky Crypto Algorithm

### Description:

1. Is any data transmitted in clear text? This concerns protocols such as HTTP, SMTP, FTP also using TLS upgrades like STARTTLS. External internet traffic is hazardous. Verify all internal traffic, e.g., between load balancers, web servers, or back-end systems.
2. Are any old or weak cryptographic algorithms or protocols used either by default or in older code?
3. Are deprecated hash functions such as MD5 or SHA1 in use, or are non-cryptographic hash functions used when cryptographic hash functions are needed?

### How to prevent

1. Disable caching for response that contain sensitive data.
2. Do not use legacy protocols such as FTP and SMTP for transporting sensitive data.
3. Initialization vectors must be chosen appropriate for the mode of operation. For many modes, this means using a CSPRNG (cryptographically secure pseudo random number generator). For modes that require a nonce, then the initialization vector (IV) does not need a CSPRNG. In all cases, the IV should never be used twice for a fixed key.

Avoid deprecated cryptographic functions and padding schemes, such as MD5, SHA1, PKCS number 1 v1.5 .


https://owasp.org/Top10/A02_2021-Cryptographic_Failures/

## Insecure Design

### Overview:
 Notable Common Weakness Enumerations (CWEs) include CWE-209: Generation of Error Message Containing Sensitive Information, CWE-256: Unprotected Storage of Credentials,

### Description

Insecure design is a broad category representing different weaknesses, expressed as “missing or ineffective control design.” Insecure design is not the source for all other Top 10 risk categories. There is a difference between insecure design and insecure implementation. We differentiate between design flaws and implementation defects for a reason, they have different root causes and remediation. A secure design can still have implementation defects leading to vulnerabilities that may be exploited. An insecure design cannot be fixed by a perfect implementation as by definition, needed security controls were never created to defend against specific attacks. 

### How to prevent

- Use threat modeling for critical authentication, access control, business logic, and key flows
- Integrate plausibility checks at each tier of your application (from frontend to backend)
- Write unit and integration tests to validate that all critical flows are resistant to the threat model. Compile use-cases and misuse-cases for each tier of your application.
- Limit resource consumption by user or service

https://owasp.org/Top10/A04_2021-Insecure_Design/

## Security Misconfiguration

### Description

The application might be vulnerable if the application is:

- Missing appropriate security hardening across any part of the application stack or improperly configured permissions on cloud services.
- Unnecessary features are enabled or installed (e.g., unnecessary ports, services, pages, accounts, or privileges).
- Error handling reveals stack traces or other overly informative error messages to users.
- For upgraded systems, the latest security features are disabled or not configured securely.

### How to Prevent

Secure installation processes should be implemented, including:

- CI/CD. A repeatable hardening process makes it fast and easy to deploy another environment that is appropriately locked down. Development, QA, and production environments should all be configured identically, with different credentials used in each environment. This process should be automated to minimize the effort required to set up a new secure environment.

https://owasp.org/Top10/A05_2021-Security_Misconfiguration/

## A06:2021 – Vulnerable and Outdated Components

### How to Prevent

Remove unused dependencies, unnecessary features, components, files, and documentation.

Continuously inventory the versions of both client-side and server-side components (e.g., frameworks, libraries) and their dependencies using tools like versions, OWASP Dependency Check, retire.js, etc. Continuously monitor sources like Common Vulnerability and Exposures (CVE) and National Vulnerability Database (NVD) for vulnerabilities in the components. Use software composition analysis tools to automate the process. Subscribe to email alerts for security vulnerabilities related to components you use.

Only obtain components from official sources over secure links. Prefer signed packages to reduce the chance of including a modified, malicious component (See A08:2021-Software and Data Integrity Failures).

https://owasp.org/Top10/A06_2021-Vulnerable_and_Outdated_Components/

## A07:2021 – Identification and Authentication Failures

### Description

It happens when
* Permits default, weak, or well-known passwords, such as "Password1" or "admin/admin".
* Uses weak or ineffective credential recovery and forgot-password processes, such as "knowledge-based answers," which cannot be made safe.
* Uses plain text, encrypted, or weakly hashed passwords data stores (see A02:2021-Cryptographic Failures).

#### How to Prevent

* Where possible, implement multi-factor authentication to prevent automated credential stuffing, brute force, and stolen credential reuse attacks.
* Implement weak password checks, such as testing new or changed passwords against the top 10,000 worst passwords list.
* Align password length, complexity, and rotation policies 
* Limit or increasingly delay failed login attempts, but be careful not to create a denial of service scenario. Log all failures and alert administrators when credential stuffing, brute force, or other attacks are detected.
* Use a server-side, secure, built-in session manager that generates a new random session ID with high entropy after login. Session identifier should not be in the URL, be securely stored, and invalidated after logout, idle, and absolute timeouts.

https://owasp.org/Top10/A07_2021-Identification_and_Authentication_Failures/
