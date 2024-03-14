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

