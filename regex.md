# Regular Expression

## Character classes

The character class is the most basic regex concept after a literal match. It makes one small sequence of characters match a larger set of characters. 
For example, [A-Z] could stand for any uppercase letter in the English alphabet, and \d could mean any digit. Character classes apply to both POSIX levels.

## Different Regular Expression Engines

A regular expression “engine” is a piece of software that can process regular expressions, trying to match the pattern to the given string. Usually, the engine is part of a larger application and you do not access the engine directly. Rather, the application invokes it for you when needed, making sure the right regular expression is applied to the right file or data.

As usual in the software world, different regular expression engines are not fully compatible with each other. The syntax and behavior of a particular engine is called a regular expression flavor. This tutorial covers all the popular regular expression flavors, including Perl, PCRE, PHP, .NET, Java, JavaScript, XRegExp, VBScript, Python, Ruby, Delphi, R, Tcl, POSIX, and many others. 
The tutorial alerts you when these flavors require different syntax or show different behavior. 

## regex flavor

The syntax and behavior of a particular engine is called a regular expression flavor. 

## POSIX Basic Regular Expressions

POSIX or “Portable Operating System Interface for uniX” is a collection of standards that define some of the functionality that a (UNIX) operating system should support. One of these standards defines two flavors of regular expressions. Commands involving regular expressions, such as grep and egrep, implement these flavors on POSIX-compliant UNIX systems. Several database systems also use POSIX regular expressions.

A BRE supports POSIX bracket expressions, which are similar to character classes in other regex flavors, with a few special features. 

## POSIX Bracket Expressions

POSIX bracket expressions are a special kind of character classes. POSIX bracket expressions match one character out of a set of characters, just like regular character classes. They use the same syntax with square brackets. A hyphen creates a range, and a caret at the start negates the bracket expression.

## POSIX Extended Regular Expressions

The Extended Regular Expressions or ERE flavor standardizes a flavor similar to the one used by the UNIX egrep command. “Extended” is relative to the original UNIX grep.

## PCRE

Perl Compatible Regular Expressions (PCRE) is a library written in C, which implements a regular expression engine, inspired by the capabilities of the Perl programming language. Philip Hazel started writing PCRE in summer 1997. PCRE's syntax is much more powerful and flexible than either of the POSIX regular expression flavors (BRE, ERE) and than that of many other regular-expression libraries.

## 1 half-width alphanumeric characters 

$pattern = '/^[a-zA-Z0-9]+$/';
        if (!preg_match($pattern, $request->input('user_id'))) { 
            return response()->json(["message"=> "Account creation failed", "cause" => "The user_id contains non-alphanumeric characters or full-width characters."], 400);
        
        }

[a-zA-Z0-9]+: Matches one or more occurrences of any lowercase or uppercase letter (a-z, A-Z) or number (0-9).

## 2 ASCII characters without space or control codes

$pattern = '/^[[:graph:]]+$/';
        if (!preg_match($pattern, $request->input('password'))) {
            return response()->json(["message"=> "Account creation failed", "cause" => "The user_id contains non-alphanumeric characters or full-width characters."], 400);
        
        }

For [[:graph:]], [] in the leftmost and rightmost is regexp class syntax. [] inside is POSIX syntax.

[:graph:]+: Matches one or more occurrences of any printable character according to the POSIX character class. This includes printable ASCII characters from ! (decimal 33) to ~ (decimal 126), excluding space ( - decimal 32).

[:graph:], Visible characters (anything except spaces and control characters). unicide is [^\p{Z}\p{C}].	

## 3 matching any character except control code.

1. \P{C}
2. [^\p{Cntrl}]

$pattern = "/\P{C}/";
        if ($request->input('nickname') && !preg_match($pattern, $request->input('nickname'))) {
            return response()->json(["message"=> "User updation failed", "cause" => "The nick matched a control character"], 400);
        }


\P{C} means Visible characters and spaces (anything except control characters) according to below link. It equals to [:print:] in POSIX.

\P{C} means match a single character not belonging to invisible control characters and unused code points.


1. \P means you can match a single character not belonging to that category.

Unicode Categories
In addition to complications, Unicode also brings new possibilities. One is that each Unicode character belongs to a certain category. You can match a single character belonging to the “letter” category with \p{L}. You can match a single character not belonging to that category with \P{L}.

2. {C} means Other

The most basic overall character property is the General_Category, which is a basic categorization of Unicode characters into: Letters, Punctuation, Symbols, Marks, Numbers, Separators, and Other. These property values each have a single letter abbreviation, which is the uppercase first character except for separators, which use Z. The official data mapping Unicode characters to the General_Category value is in UnicodeData.txt.

Each of these categories has different subcategories. For example, the subcategories for Letter are uppercase, lowercase, titlecase, modifier, and other (in this case, other includes uncased letters such as Chinese). By convention, the subcategory is abbreviated by the category letter (in uppercase), followed by the first character of the subcategory in lowercase. For example, Lu stands for Uppercase Letter.

3. \p{C} or \p{Other}: invisible control characters and unused code points.

It includes below subcategories Cc | Cf | Cs | Co | Cn.
  \p{Cc} or \p{Control}: an ASCII or Latin-1 control character: 0x00–0x1F and 0x7F–0x9F.
  \p{Cf} or \p{Format}: invisible formatting indicator.
  \p{Co} or \p{Private_Use}: any code point reserved for private use.
  \p{Cs} or \p{Surrogate}: one half of a surrogate pair in UTF-16 encoding.
  \p{Cn} or \p{Unassigned}: any code point to which no character has been assigned.

https://www.regular-expressions.info/unicode.html  
https://www.unicode.org/reports/tr18/#General_Category_Property  
https://www.regular-expressions.info/posixbrackets.html  

