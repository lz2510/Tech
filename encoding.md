# Character encodings

## Common character encodings

ASCII, ISO8859, Unicode UTF-8, GB 2312, GBK and Big5.

https://en.wikipedia.org/wiki/Character_encoding#Common_character_encodings

## Character encoding vs code points vs code space

Character encoding is the process of assigning numbers to graphical characters, especially the written characters of human language, allowing them to be stored, transmitted, and transformed using digital computers.[1] The numerical values that make up a character encoding are known as "code points" and collectively comprise a "code space", a "code page", or a "character map".

https://en.wikipedia.org/wiki/Character_encoding

## charset = code page

sjis means Shift JIS. 

In setLocale use siji by 

      setlocale(LC_ALL, 'ja_JP.sijs');

In mb_convert_encoding, use SJIS-win. It’s a variant for windows, it also has SJIS-mac for Mac.

      $content = mb_convert_encoding($content, “UTF-8", "SJIS-win");

https://en.wikipedia.org/wiki/Character_encoding#Code_pages  
https://stackoverflow.com/questions/34544285/php-cant-read-file-with-shift-jis-encoding  

## Morse code

The earliest well-known electrically transmitted character code, Morse code, introduced in the 1840s, used a system of four "symbols" (short signal, long signal, short space, long space) to generate codes of variable length.

## UTF-8

UTF-8, which is backward compatible with fixed-length ASCII.  
UTF-8 is the most widely used by a large margin, in part due to its backwards-compatibility with ASCII.  

## 7-bit codes

ASCII has 128 code points, 2^7=128

ISO/IEC 646, like ASCII, is a 7-bit character set. It does not make any additional codes available, so the same code points encoded different characters in different countries. 

https://en.wikipedia.org/wiki/ASCII#7-bit_codes

## ASCII bit width. 

US_ASCII uses 7-bit instead of 8-bit

The Internet Assigned Numbers Authority (IANA) prefers the name US-ASCII for this character encoding.[2]

The standards committee decided against shifting, and so ASCII required at least a seven-bit code.

The committee considered an eight-bit code, since eight bits (octets) would allow two four-bit patterns to efficiently encode two digits with binary-coded decimal. However, it would require all data transmission to send eight bits when seven could suffice. The committee voted to use a seven-bit code to minimize costs associated with data transmission. 

https://en.wikipedia.org/wiki/ASCII#Bit_width

## ASCII extensions

As computer technology spread throughout the world, different standards bodies and corporations developed many variations of ASCII to facilitate the expression of non-English languages that used Roman-based alphabets. One could class some of these variations as "ASCII extensions".

It would share most characters in common, but assign other locally useful characters to several code points reserved for "national use".

Many other countries developed variants of ASCII to include non-English letters (e.g. é, ñ, ß, Ł), currency symbols (e.g. £, ¥). 

7-bit codes like ISO/IEC 646, adds less locally useful characters.

8-bit codes like ISO/IEC 8859, adds more locally useful characters.

ASCII was incorporated into the Unicode (1991) character set as the first 128 symbols, so the 7-bit ASCII characters have the same numeric codes in both sets. This allows UTF-8 to be backward compatible with 7-bit ASCII.

https://en.wikipedia.org/wiki/ASCII#Variants_and_derivations  

## latin1 

latin is the alias of ISO 8859-1. As it consists of 191 characters from the Latin script

ISO/IEC 8859-1:1998, Information technology — 8-bit single-byte coded graphic character sets — Part 1: Latin alphabet No. 1, is part of the ISO/IEC 8859 series of ASCII-based standard character encodings, first edition published in 1987. ISO/IEC 8859-1 encodes what it refers to as "Latin alphabet no. 1", consisting of 191 characters from the Latin script. 

https://en.wikipedia.org/wiki/ISO/IEC_8859-1

## Locale

locale in setlocale() meaning locale.

ja_JP.SJIS and en_US.UTF-8 are locale.

In computing, a locale is a set of parameters that defines the user's language, region and any special variant preferences that the user wants to see in their user interface. Usually a locale identifier consists of at least a language code and a country/region code. Locale is an important aspect of i18n.

### POSIX platforms

[language[_territory][.codeset][@modifier]]

On POSIX platforms such as Unix, Linux and others, locale identifiers are defined in a way similar to the BCP 47 definition of language tags, but the locale variant modifier is defined differently, and the character set is optionally included as a part of the identifier. The POSIX or "XPG" format is [language[_territory][.codeset][@modifier]]. (For example, Australian English using the UTF-8 encoding is en_AU.UTF-8.)[2] 

https://en.wikipedia.org/wiki/Locale_(computer_software)

## Tags for the Identification of Languages

en-US, zh-Hans, is BCP47

en, ja are ISO standard 639.   
US, JP are ISO 3166 alpha-2 country codes.  

The language tag is composed of 1 or more parts: A primary language tag and a (possibly empty) series of subtags.

   The syntax of this tag in RFC-822 EBNF is:

    Language-Tag = Primary-tag *( "-" Subtag )
    Primary-tag = 1*8ALPHA
    Subtag = 1*8ALPHA

A single primary language subtag based on a two-letter language code from ISO 639-1.
An optional script subtag, based on a four-letter script code from ISO 15924 (usually written in Title Case);
An optional region subtag based on a two-letter country code from ISO 3166-1 alpha-2 (usually written in upper case), or a three-digit code from UN M.49 for geographical regions;


http://www.faqs.org/rfcs/rfc1766.html
https://en.wikipedia.org/wiki/IETF_language_tag#Syntax_of_language_tags
https://www.loc.gov/standards/iso639-2/php/code_list.php
https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes


### convention format

The ISO 639/ISO 3166 convention is that language names are written in lower case, while country codes are written in upper case.

This convention is recommended, but not enforced; the tags are case insensitive.

For example: en-US, zh-Hans.

http://www.faqs.org/rfcs/rfc1766.html

### region subtag vs script subtag

Region subtags are used to specify the variety of a language "as used in" a particular region. They are appropriate when the variety is regional in nature, and can be captured adequately by identifying the countries involved, as when distinguishing British English (en-GB) from American English (en-US). 

When the difference is one of script or script variety, as for simplified versus traditional Chinese characters, it should be expressed with a script subtag instead of a region subtag; in this example, zh-Hans and zh-Hant should be used instead of zh-CN/zh-SG/zh-MY and zh-TW/zh-HK/zh-MO.

https://en.wikipedia.org/wiki/IETF_language_tag#ISO_3166-1_and_UN_M.49

## Halfwidth and fullwidth forms

In CJK (Chinese, Japanese, and Korean) computing, graphic characters are traditionally classed into fullwidth[a] and halfwidth[b] characters. Unlike monospaced fonts, a halfwidth character occupies half the width of a fullwidth character, hence the name.

https://en.wikipedia.org/wiki/Halfwidth_and_fullwidth_forms

## charset pronunciation 

> I mostly hear "charset" pronounced "care-set" /kɛ(ə)rsɛt/, probably because that makes the root word "character" clear.
> A rarer deviant pronunciation is "char-set" /tʃɑrsɛt/ (as if it where somewhat charring).

https://lists.w3.org/Archives/Public/ietf-http-wg/2013AprJun/0779.html

## default_charset string

"UTF-8" is the default value and its value is used as the default character encoding for htmlentities(), html_entity_decode() and htmlspecialchars() if the encoding parameter is omitted. The value of default_charset will also be used to set the default character set for iconv functions if the iconv.input_encoding, iconv.output_encoding and iconv.internal_encoding configuration options are unset, and for mbstring functions if the mbstring.http_input mbstring.http_output mbstring.internal_encoding configuration option is unset.

All versions of PHP will use this value as the charset within the default Content-Type header sent by PHP if the header isn't overridden by a call to header().

Setting default_charset to an empty value is not recommended.

https://www.php.net/manual/en/ini.core.php#ini.default-charset

## php supported encoding

https://www.php.net/manual/en/function.htmlentities.php  
https://www.php.net/manual/en/mbstring.encodings.php  
https://www.php.net/manual/en/mbstring.supported-encodings.php  
