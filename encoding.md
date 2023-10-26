# Character encodings

## Common character encodings

ASCII, ISO8859, Unicode UTF-8, GB 2312, GBK and Big5.

https://en.wikipedia.org/wiki/Character_encoding#Common_character_encodings

## Character encoding vs code points vs code space

Character encoding is the process of assigning numbers to graphical characters, especially the written characters of human language, allowing them to be stored, transmitted, and transformed using digital computers.[1] The numerical values that make up a character encoding are known as "code points" and collectively comprise a "code space", a "code page", or a "character map".

https://en.wikipedia.org/wiki/Character_encoding

## Morse code

The earliest well-known electrically transmitted character code, Morse code, introduced in the 1840s, used a system of four "symbols" (short signal, long signal, short space, long space) to generate codes of variable length.

## UTF-8

UTF-8, which is backward compatible with fixed-length ASCII.  
UTF-8 is the most widely used by a large margin, in part due to its backwards-compatibility with ASCII.  

## 7-bit codes

ASCII has 128 code points, 2^7=128

ISO/IEC 646, like ASCII, is a 7-bit character set. It does not make any additional codes available, so the same code points encoded different characters in different countries. 

https://en.wikipedia.org/wiki/ASCII#7-bit_codes

## ASCUU bit width. 

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

