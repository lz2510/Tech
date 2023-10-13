# Computing

## raw binary data

Binary you will know: the bi- relates to two. 

A single binary digit is abbreviated to “bit.

010010110101110011110000110101001011010010110101110011110000110101001011

This stream of bits above is difficult to read, copy or manipulate for human readers and even computers can not deal with them without a beginning, an end and some form of grouping.

How to read? We have to group. If we group 1 bit, 0 and 1 have no meaning. If we group 2 bits, 2^2 is 4, so 4-based value is also meaning-less. Then 3 bits, 2^3 is 8, 8-based value is the same. When we go to 4 bits, 2^4 is 16. 8 bits is two dex, can be used ASCII.

Data is the plural of datum which is a reference mark, number or value.

Bits are usually grouped into varying sizes of words or bytes: the most common being the octet or 8 bits; 4 bits can be used to represent counts from 0 to 15, 2^4 is 16; the values of a hexadecimal digit: represented as 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F. So an octet can be represented by two hexadecimal digits.

0100_1011 0101_1100 1111_0000 1101_0100 1011_0100 1011_0101 1100_1111 0000_1101 0100_1011

4B 5C F0 D4 B4 B5 CF 0B 4B

This is the normal form that humans might encounter raw binary data.

Data simply means a series of values without necessarily having any intended meaning. They could be ASCII characters

https://www.quora.com/What-is-raw-binary-data

## signedness

In computing, signedness is a property of data types representing numbers in computer programs. A numeric variable is signed if it can represent both positive and negative numbers, and unsigned if it can only represent non-negative numbers (zero or positive numbers).

As signed numbers can represent negative numbers, they lose a range of positive numbers that can only be represented with unsigned numbers of the same size (in bits) because roughly half the possible values are non-positive values, whereas the respective unsigned type can dedicate all the possible values to the positive number range.

For example, a two's complement signed 16-bit integer can hold the values −32768 to 32767 inclusively, while an unsigned 16 bit integer can hold the values 0 to 65535. For this sign representation method, the leftmost bit (most significant bit) denotes whether the value is negative (0 for positive or zero, 1 for negative).

https://en.wikipedia.org/wiki/Signedness

## signed number representations

In computing, signed number representations are required to encode negative numbers in binary number systems.

In mathematics, negative numbers in any base are represented by prefixing them with a minus sign ("−"). However, in RAM or CPU registers, numbers are represented only as sequences of bits, without extra symbols. The four best-known methods of extending the binary numeral system to represent signed numbers are: sign–magnitude, ones' complement, two's complement, and offset binary.

https://en.wikipedia.org/wiki/Signed_number_representations

## Two's complement

Two's complement is the most common method of representing signed (positive, negative, and zero) integers on computers,[1] and more generally, fixed point binary values. Two's complement uses the binary digit with the greatest place value as the sign to indicate whether the binary number is positive or negative. When the most significant bit is 1, the number is signed as negative; and when the most significant bit is 0 the number is signed as positive.

https://en.wikipedia.org/wiki/Two%27s_complement

## 32-bit vs 64-bit

32-bit, 2^32 bite, 4GB memory.

A 32-bit system can access 232 memory addresses, i.e., 4 GB of RAM or physical memory.

One bit in the register can typically reference an individual byte. Thus, the 32-bit system is capable of addressing about 4,294,967,296 bytes (4 GB) of RAM. Its actual limit is less than 3.5 GB (usually) because a portion of the register stores various other temporary values apart from the memory addresses.

All calculations take place in the registers. When you're adding (or subtracting, or whatever) variables together in your code, they get loaded from memory into the registers (if they're not already there, but while you can declare an infinite number of variables, the number of registers is limited). So, having larger registers allows you to perform "larger" calculations in the same time. Not that this size-difference matters so much in practice when it comes to regular programs (since at least I rarely manipulate values larger than 2^32), but that is how it works.

Also, certain registers are used as pointers into your memory space and hence limits the maximum amount of memory that you can reference. A 32-bit processor can only reference 2^32 bytes (which is about 4 GB of data). A 64-bit processor can manage a whole lot more obviously.

There are other consequences as well, but these are the two that comes to mind.

https://www.javatpoint.com/32-bit-vs-64-bit-operating-system  
https://stackoverflow.com/questions/4552905/what-is-the-difference-between-a-32-bit-and-64-bit-processor  
https://stackoverflow.com/questions/5812406/16-bit-int-vs-32-bit-int-vs-64-bit-int  
