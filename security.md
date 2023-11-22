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

Injection includes SQL Injection and XSS.

### SQL Injection

An application is vulnerable to attack when:

1. User-supplied data is not validated, filtered, or sanitized by the application.
2. Dynamic queries or non-parameterized calls without context-aware escaping are used directly in the interpreter.

SQL Injection flaws are introduced when software developers create dynamic database queries constructed with string concatenation which includes user supplied input. To avoid SQL injection flaws is simple. Developers need to either: a) stop writing dynamic queries with string concatenation; and/or b) prevent user supplied input which contains malicious SQL from affecting the logic of the executed query.

#### Risk Factors
The platform affected can be:

Language: SQL  
Platform: Any (requires interaction with a SQL database)  

https://owasp.org/www-community/attacks/SQL_Injection

#### How to Prevent

Primary Defenses:

- Option 1: Use of Prepared Statements (with Parameterized Queries)
- Option 2: Use of Properly Constructed Stored Procedures
- Option 3: Allow-list Input Validation
- Option 4: Escaping All User Supplied Input

##### Defense Option 1: Prepared Statements (with Parameterized Queries)

Use modern framework like Laravel, ORM model or query builder use prepared statements in default.

SQL Injection is best prevented through the use of parameterized queries or called Query Parameterization. Prepared statements are one of the query parameterization. Another is bind variations in store procedure.

The use of prepared statements with variable binding (aka parameterized queries) is how all developers should first be taught how to write database queries. They are simple to write, and easier to understand than dynamic queries. Parameterized queries force the developer to first define all the SQL code, and then pass in each parameter to the query later. This coding style allows the database to distinguish between code and data, regardless of what user input is supplied.

Prepared statements ensure that an attacker is not able to change the intent of a query, even if SQL commands are inserted by an attacker. In the safe example below, if an attacker were to enter the userID of tom' or '1'='1, the parameterized query would not be vulnerable and would instead look for a username which literally matched the entire string tom' or '1'='1.

Language specific recommendations:

PHP – use PDO with strongly typed parameterized queries (using bindParam())

##### Defense Option 2: Stored Procedures¶

- Use bind variables in database
- Use input validation or proper escaping in code

bind variations in store procedure is one of the query parameterization. Another is Prepared statements.

Stored procedures are not always safe from SQL injection. However, certain standard stored procedure programming constructs have the same effect as the use of parameterized queries when implemented safely which is the norm for most stored procedure languages.

They require the developer to just build SQL statements with parameters which are automatically parameterized unless the developer does something largely out of the norm. The difference between prepared statements and stored procedures is that the SQL code for a stored procedure is defined and stored in the database itself, and then called from the application. Both of these techniques have the same effectiveness in preventing SQL injection so your organization should choose which approach makes the most sense for you.

Note: "Implemented safely" means the stored procedure does not include any unsafe dynamic SQL generation. Developers do not usually generate dynamic SQL inside stored procedures. However, it can be done, but should be avoided. If it can't be avoided, the stored procedure must use input validation or proper escaping as described in this article to make sure that all user supplied input to the stored procedure can't be used to inject SQL code into the dynamically generated query. 

The SQL you write in your web application isn't the only place that SQL injection vulnerabilities can be introduced. If you are using Stored Procedures, and you are dynamically constructing SQL inside them, you can also introduce SQL injection vulnerabilities.

Dynamic SQL can be parameterized using bind variables, to ensure the dynamically constructed SQL is secure.

Bind variables are used to tell the database that the inputs to this dynamic SQL are 'data' and not possibly code.

##### Defense Option 3: Allow-list Input Validation¶

Various parts of SQL queries aren't legal locations for the use of bind variables, such as the names of tables or columns, and the sort order indicator (ASC or DESC). In such situations, input validation or query redesign is the most appropriate defense. For the names of tables or columns, ideally those values come from the code, and not from user parameters.

But if user parameter values are used for targeting different table names and column names, then the parameter values should be mapped to the legal/expected table or column names to make sure unvalidated user input doesn't end up in the query. Please note, this is a symptom of poor design and a full rewrite should be considered if time allows.

##### Defense Option 4: Escaping All User-Supplied Input¶

This technique should only be used as a last resort, when none of the above are feasible. Input validation is probably a better choice as this methodology is frail compared to other defenses and we cannot guarantee it will prevent all SQL Injections in all situations.

This technique is to escape user input before putting it in a query. It is very database specific in its implementation. It's usually only recommended to retrofit legacy code when implementing input validation isn't cost effective. Applications built from scratch, or applications requiring low risk tolerance should be built or re-written using parameterized queries, stored procedures, or some kind of Object Relational Mapper (ORM) that builds your queries for you.

This technique works like this. Each DBMS supports one or more character escaping schemes specific to certain kinds of queries. If you then escape all user supplied input using the proper escaping scheme for the database you are using, the DBMS will not confuse that input with SQL code written by the developer, thus avoiding any possible SQL injection vulnerabilities.

https://owasp.org/Top10/A03_2021-Injection/  
https://cwe.mitre.org/data/definitions/89.html  
https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html  
https://cheatsheetseries.owasp.org/cheatsheets/Query_Parameterization_Cheat_Sheet.html  

### dynamic query vs parameterized query

The main difference between a dynamic query and a parameterized query is that in a dynamic query, the SQL logic is built along with the user input. In a parameterized query, the SQL logic is defined first and locked, then user input is passed as parameters along with its data type defined.

### prepared statements vs bind variables

The prepared statements is a feature in programming language, like PDO in php. bind variables are a feature in database. Both are query parameterization.

Bind variables are often called bind parameters or query parameters.

A SQL bind variable is a feature that allows you to turn part of a query into a parameter. Bind variables are often used in WHERE clauses to filter data.

https://www.databasestar.com/sql-bind-variables/#:~:text=A%20bind%20variable%20is%20an,WHERE%20clauses%20to%20filter%20data.

### SQL Injection in Laravel

SQL Injection attacks are unfortunately quite common in modern web applications and entail attackers providing malicious request input data to interfere with SQL queries. This guide covers SQL injection and how it can be prevented specifically for Laravel applications. You may also refer the SQL Injection Prevention Cheatsheet for more information that is not specific to Laravel.

#### Eloquent ORM SQL Injection Protection

By default, Laravel's Eloquent ORM protects against SQL injection by parameterizing queries and using SQL bindings. For instance, consider the following query:

          use App\Models\User;
          
          User::where('email', $email)->get();
          
The code above fires the query below:

          select * from `users` where `email` = ?
          
So, even if $email is untrusted user input data, you are protected from SQL injection attacks.

#### Raw Query SQL Injection

Laravel also offers raw query expressions and raw queries to construct complex queries or database specific queries that aren't supported out of the box.

While this is great for flexibility, you must be careful to always use SQL data bindings for such queries. Consider the following query:

          use Illuminate\Support\Facades\DB;
          use App\Models\User;
          
          User::whereRaw('email = "'.$request->input('email').'"')->get();
          DB::table('users')->whereRaw('email = "'.$request->input('email').'"')->get();
          
Both lines of code actually execute the same query, which is vulnerable to SQL injection as the query does not use SQL bindings for untrusted user input data.

The code above fires the following query:

          select * from `users` where `email` = "value of email query parameter"
          
Always remember to use SQL bindings for request data. We can fix the above code by making the following modification:

          use App\Models\User;
          
          User::whereRaw('email = ?', [$request->input('email')])->get();
          
We can even use named SQL bindings like so:

          use App\Models\User;
          
          User::whereRaw('email = :email', ['email' => $request->input('email')])->get();
          
#### Column Name SQL Injection

You must never allow user input data to dictate column names referenced by your queries.

The following queries may be vulnerable to SQL injection:

          use App\Models\User;
          
          User::where($request->input('colname'), 'somedata')->get();
          User::query()->orderBy($request->input('sortBy'))->get();
          
It is important to note that even though Laravel has some in-built features such as wrapping column names to protect against the above SQL injection vulnerabilities, some database engines (depending on versions and configurations) may still be vulnerable because binding column names is not supported by databases.

At the very least, this may result in a mass assignment vulnerability instead of a SQL injection because you may have expected a certain set of column values, but since they are not validated here, the user is free to use other columns as well.

Always validate user input for such situations like so:

          use App\Models\User;
          
          $request->validate(['sortBy' => 'in:price,updated_at']);
          User::query()->orderBy($request->validated()['sortBy'])->get();
          
#### Validation Rule SQL Injection

Certain validation rules have the option of providing database column names. Such rules are vulnerable to SQL injection in the same manner as column name SQL injection because they construct queries in a similar manner.

For example, the following code may be vulnerable:

          use Illuminate\Validation\Rule;
          
          $request->validate([
              'id' => Rule::unique('users')->ignore($id, $request->input('colname'))
          ]);
          
Behind the scenes, the above code triggers the following query:

          use App\Models\User;
          
          $colname = $request->input('colname');
          User::where($colname, $request->input('id'))->where($colname, '<>', $id)->count();
          
Since the column name is dictated by user input, it is similar to column name SQL injection.

https://cheatsheetseries.owasp.org/cheatsheets/Laravel_Cheat_Sheet.html#sql-injection  

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

### Cross Site Scripting (XSS)

XSS attacks are injection attacks where malicious scripts (such as JavaScript code snippets) are injected into trusted websites.

Laravel's Blade templating engine has echo statements {{ }} that automatically escape variables using the htmlspecialchars PHP function to protect against XSS attacks.

Laravel also offers displaying unescaped data using the unescaped syntax {!! !!}. This must not be used on any untrusted data, otherwise your application will be subject to an XSS attack.

For instance, if you have something like this in any of your Blade templates, it would result in a vulnerability:

          {!! request()->input('somedata') !!}
          
This, however, is safe to do:

          {{ request()->input('somedata') }}
          
For other information on XSS prevention that is not specific to Laravel, you may refer the Cross Site Scripting Prevention Cheatsheet.

https://cheatsheetseries.owasp.org/cheatsheets/Laravel_Cheat_Sheet.html#cross-site-scripting-xss  

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

#### File Upload Validation

Unrestricted File Uploads¶

Unrestricted file upload attacks entail attackers uploading malicious files to compromise web applications. This section describes how to protect against such attacks while building Laravel applications. 

##### Always Validate File Type and Size

Always validate the file type (extension or MIME type) and file size to avoid storage DOS attacks and remote code execution:

          $request->validate([
              'photo' => 'file|size:100|mimes:jpg,bmp,png'
          ]);
          
Storage DOS attacks exploit missing file size validations and upload massive files to cause a denial of service (DOS) by exhausting the disk space.

Remote code execution attacks entail first, uploading malicious executable files (such as PHP files) and then, triggering their malicious code by visiting the file URL (if public).

Both these attacks can be avoided by simple file validations as mentioned above.

##### Do Not Rely On User Input To Dictate Filenames or Path

If your application allows user controlled data to construct the path of a file upload, this may result in overwriting a critical file or storing the file in a bad location.

Consider the following code:

          Route::post('/upload', function (Request $request) {
              $request->file('file')->storeAs(auth()->id(), $request->input('filename'));
          
              return back();
          });
          
This route saves a file to a directory specific to a user ID. Here, we rely on the filename user input data and this may result in a vulnerability as the filename could be something like ../2/filename.pdf. This will upload the file in user ID 2's directory instead of the directory pertaining to the current logged in user.

To fix this, we should use the basename PHP function to strip out any directory information from the filename input data:

          Route::post('/upload', function (Request $request) {
              $request->file('file')->storeAs(auth()->id(), basename($request->input('filename')));
          
              return back();
          });

https://cheatsheetseries.owasp.org/cheatsheets/Laravel_Cheat_Sheet.html#unrestricted-file-uploads  
https://cheatsheetseries.owasp.org/cheatsheets/Input_Validation_Cheat_Sheet.html#file-upload-validation  
https://cheatsheetseries.owasp.org/cheatsheets/File_Upload_Cheat_Sheet.html 

## Broken Access Control

Description:

1. Violation of the principle of least privilege or deny by default, where access should only be granted for particular capabilities, roles, or users, but is available to anyone.
2. Accessing API with missing access controls for POST, PUT and DELETE.

https://owasp.org/Top10/A01_2021-Broken_Access_Control/

## Cryptographic Failures

Notable Common Weakness Enumerations (CWEs) included are CWE-259: Use of Hard-coded Password, CWE-327: Broken or Risky Crypto Algorithm

Description:

1. Is any data transmitted in clear text? This concerns protocols such as HTTP, SMTP, FTP also using TLS upgrades like STARTTLS. External internet traffic is hazardous. Verify all internal traffic, e.g., between load balancers, web servers, or back-end systems.

2. Are any old or weak cryptographic algorithms or protocols used either by default or in older code?

https://owasp.org/Top10/A02_2021-Cryptographic_Failures/

## Insecure Design

Overview:
 Notable Common Weakness Enumerations (CWEs) include CWE-209: Generation of Error Message Containing Sensitive Information, CWE-256: Unprotected Storage of Credentials,

https://owasp.org/Top10/A04_2021-Insecure_Design/

## Security Misconfiguration

### How to Prevent

Secure installation processes should be implemented, including:

CI/CD, A repeatable hardening process makes it fast and easy to deploy another environment that is appropriately locked down. Development, QA, and production environments should all be configured identically, with different credentials used in each environment. This process should be automated to minimize the effort required to set up a new secure environment.

https://owasp.org/Top10/A05_2021-Security_Misconfiguration/

## A06:2021 – Vulnerable and Outdated Components

### How to Prevent

Remove unused dependencies, unnecessary features, components, files, and documentation.

Continuously inventory the versions of both client-side and server-side components (e.g., frameworks, libraries) and their dependencies using tools like versions, OWASP Dependency Check, retire.js, etc. Continuously monitor sources like Common Vulnerability and Exposures (CVE) and National Vulnerability Database (NVD) for vulnerabilities in the components. Use software composition analysis tools to automate the process. Subscribe to email alerts for security vulnerabilities related to components you use.

Only obtain components from official sources over secure links. Prefer signed packages to reduce the chance of including a modified, malicious component (See A08:2021-Software and Data Integrity Failures).

https://owasp.org/Top10/A06_2021-Vulnerable_and_Outdated_Components/

## A07:2021 – Identification and Authentication Failures

How to Prevent

Where possible, implement multi-factor authentication to prevent automated credential stuffing, brute force, and stolen credential reuse attacks.

Implement weak password checks, such as testing new or changed passwords against the top 10,000 worst passwords list.

https://owasp.org/Top10/A07_2021-Identification_and_Authentication_Failures/
