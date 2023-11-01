# Security

## Top 10 Web Application Security Risks

![image](https://github.com/lz2510/Tech/assets/1209204/43469836-cdd7-420c-bbc1-b316bbd0aa84)

https://owasp.org/www-project-top-ten/

## Injection

Injection includes SQL Injection and XSS.

### SQL Injection

An application is vulnerable to attack when:

1. User-supplied data is not validated, filtered, or sanitized by the application.
2. Dynamic queries or non-parameterized calls without context-aware escaping are used directly in the interpreter.


#### How to Prevent

Preventing injection requires keeping data separate from commands and queries:

1. The preferred option is to use a safe API like php PDO which has a prepared statement feature or ORM.
2. Use server-side input validation.
3. Escape special characters and quote arguments.

https://owasp.org/Top10/A03_2021-Injection/  
https://cwe.mitre.org/data/definitions/89.html  

## XSS

Cross-Site Scripting (XSS) attacks are a type of injection.

https://owasp.org/www-project-top-ten/2017/A7_2017-Cross-Site_Scripting_(XSS).html  
https://owasp.org/www-community/attacks/xss/  

### how to prevent XSS

1. Framework Security like vue.js
2. Output Encoding, for example use html entity for “HTML Contexts”.&    &amp;  <    &lt;  >    &gt;

https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#output-encoding-for-html-contexts


