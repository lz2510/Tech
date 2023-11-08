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

XSS

Overview

Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.

An attacker can use XSS to send a malicious script to an unsuspecting user. The end user’s browser has no way to know that the script should not be trusted, and will execute the script. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.

There are three forms of XSS, usually targeting users’ browsers:
* Reflected XSS: The application or API includes unvalidated and unescaped user input as part of HTML output. A successful attack can allow the attacker to execute arbitrary HTML and JavaScript in the victim’s browser. Typically the user will need to interact with some malicious link that points to an attacker-controlled page, such as malicious watering hole websites, advertisements, or similar.
* Stored XSS: The application or API stores unsanitized user input that is viewed at a later time by another user or an administrator. Stored XSS is often considered a high or critical risk.
* DOM XSS: JavaScript frameworks, single-page applications, and APIs that dynamically include attacker-controllable data to a page are vulnerable to DOM XSS. Ideally, the application would not send attacker-controllable data to unsafe JavaScript APIs.

https://owasp.org/www-project-top-ten/2017/A7_2017-Cross-Site_Scripting_(XSS).html  
https://owasp.org/www-community/attacks/xss/  

### how to prevent XSS

1. Framework Security like vue.js
2. Output Encoding, for example use html entity for “HTML Contexts”.&    &amp;  <    &lt;  >    &gt;

https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#output-encoding-for-html-contexts

### escaping and htmlentities

Should the data be htmlenties-encoded before inserting to db? No. The data inserted into database should be clean and meaningful. As the data can be used for json, csv or pdf which is not html.

Here's the general rule of thumb.

          Escape variables at the last possible moment.

You want your variables to be clean representations of the data. That is, if you are trying to store the last name of someone named "O'Brien", then you definitely don't want these:

O&#39;Brien
O\'Brien
.. because, well, that's not his name: there's no ampersands or slashes in it. When you take that variable and output it in a particular context (eg: insert into an SQL query, or print to a HTML page), that is when you modify it.

$name = "O'Brien";

$sql = "SELECT * FROM people "
     . "WHERE lastname = '" . mysql_real_escape_string($name) . "'";

or

$sth = dbh->prepare('SELECT * FROM people WHERE lastname = :name');
$sth->execute(['name', $name]);

prepared statement which is recommended as it will automatically escape.

$html = "<div>Last Name: " . htmlentities($name, ENT_QUOTES) . "</div>";
You never want to have htmlentities-encoded strings stored in your database. What happens when you want to generate a CSV or PDF, or anything which isn't HTML?

Keep the data clean, and only escape for the specific context of the moment.


#### mysql_real_escape_string or Prepared Statement

Prepared Statement is recommended than mysql_real_escape_string, because Prepared Statement will automatically escape and performance advantage.

Do PHP PDO prepared statments need to be escaped? No, it’s automatically escaped.

NB: This answer uses an overly-simplistic model of what escaping and prepared statements actually do.

SQL is a language. Some characters in it have special meaning. For instance ' delimits the beginning and end of a string.

When you escape data, you put a \ in front of the characters with special meaning. That causes them to mean (for example) "An apostrophe" instead of "The end of the string".

So:

          $id = $conn->real_escape_string($_POST['id']);
So now, if there was a ' in the ID, it won't break the SQL.

When you use a bound variable, it will automatically be escaped for you.

          $qry->bind_param('iss', $id, $name, $message);
So now, if there was a ' in the ID, it won't break the SQL.

… except you have already done that.

So now you have the ' turned into \' and then in to \\\' because the ' was escaped and then it was escaped again along with the \ from the first escape.

So now the first \ has been treated as data (instead of as a special SQL character) and inserted into the database.

Use prepared statements. Use only prepared statements.

(The exception is when you are doing things with variables where a prepared statement can't go, such as dynamic table names, which shouldn't be too often).

https://stackoverflow.com/questions/2077576/php-mysql-when-exactly-to-use-htmlentities  
https://stackoverflow.com/questions/34692195/clarity-on-php-prepared-statement-escaping  
https://www.php.net/manual/en/pdo.prepare.php  
https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php 

### Input Validation

#### Goals of Input Validation¶

Input validation is performed to ensure only properly formed data is entering the workflow in an information system, preventing malformed data from persisting in the database and triggering malfunction of various downstream components. Input validation should happen as early as possible in the data flow, preferably as soon as the data is received from the external party.

Data from all potentially untrusted sources should be subject to input validation, including not only Internet-facing web clients but also backend feeds over extranets, from suppliers, partners, vendors or regulators, each of which may be compromised on their own and start sending malformed data.

Input Validation should not be used as the primary method of preventing XSS, SQL Injection and other attacks which are covered in respective cheat sheets but can significantly contribute to reducing their impact if implemented properly.

#### Input validation strategies¶

Input validation should be applied on both syntactical and Semantic level.

- Syntactic validation should enforce correct syntax of structured fields (e.g. SSN, date, currency symbol).

- Semantic validation should enforce correctness of their values in the specific business context (e.g. start date is before end date, price is within expected range).

It is always recommended to prevent attacks as early as possible in the processing of the user's (attacker's) request. Input validation can be used to detect unauthorized input before it is processed by the application.

#### Implementing input validation¶

Input validation can be implemented using any programming technique that allows effective enforcement of syntactic and semantic correctness, for example:

- Data type validators available natively in web application frameworks (such as Django Validators, Apache Commons Validators etc).
- Validation against JSON Schema and XML Schema (XSD) for input in these formats.
- Type conversion (e.g. Integer.parseInt() in Java, int() in Python) with strict exception handling
Minimum and maximum value range check for numerical parameters and dates, minimum and maximum length check for strings.
- Array of allowed values for small sets of string parameters (e.g. days of week).
- Regular expressions for any other structured data covering the whole input string (^...$) and not using "any character" wildcard (such as . or \S)

#### Allow list vs block list¶

It is a common mistake to use block list validation in order to try to detect possibly dangerous characters and patterns like the apostrophe ' character, the string 1=1, or the <script> tag, but this is a massively flawed approach as it is trivial for an attacker to bypass such filters.

Plus, such filters frequently prevent authorized input, like O'Brian, where the ' character is fully legitimate. For more information on XSS filter evasion please see this wiki page.

Allow list validation is appropriate for all input fields provided by the user. Allow list validation involves defining exactly what IS authorized, and by definition, everything else is not authorized.

If it's well structured data, like dates, social security numbers, zip codes, email addresses, etc. then the developer should be able to define a very strong validation pattern, usually based on regular expressions, for validating such input.

If the input field comes from a fixed set of options, like a drop down list or radio buttons, then the input needs to match exactly one of the values offered to the user in the first place.

#### Client Side vs Server Side Validation¶

Be aware that any JavaScript input validation performed on the client can be bypassed by an attacker that disables JavaScript or uses a Web Proxy. Ensure that any input validation performed on the client is also performed on the server.

https://cheatsheetseries.owasp.org/cheatsheets/Input_Validation_Cheat_Sheet.html

