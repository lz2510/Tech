# Encryption

## hashing vs encryption

Generally hashing and encryption are for two different things. The main distinction in your case is that hashing is one way, and encryption is two-way. That is, you can decrypt the password to get them in plain text, but you cannot "de-hash" something.

If your system gets compromised and you are using encryption, the attacker will probably have all the information needed to decrypt all the passwords. This is obviously not good. If you hashed the password, even if the attacker got access to the hashed password and seed, they could not get the plain-text password.

For this reason, it's better to hash the password instead of encrypting it. Of course, this assumes you are doing the hashing correctly. Look into something like bcrypt to do this for you.

So what exactly is encryption used for? 

In general, hashing is for maintaining integrity, while encryption is for maintaining confidentiality. So you would use encryption to make sure that nobody can intercept and read your data while it's being transfered between two places. In the case of storage, you want the thing you use to be one-way, so that's why encryption is not appropriate.

https://security.stackexchange.com/questions/15553/what-is-better-salted-hash-or-openssl-encryption

## MAC

Message Authentication Code (MAC), also referred to as a tag, is used to authenticate the origin and nature of a message. MACs use authentication cryptography to verify the legitimacy of data sent through a network or transferred from one person to another. 

In other words, MAC ensures that the message is coming from the correct sender, has not been changed, and that the data transferred over a network or stored in or outside a system is legitimate and does not contain harmful code. MACs can be stored on a hardware security module, a device used to manage sensitive digital keys.

### How Does a Message Authentication Code Work?

The first step in the MAC process is the establishment of a secure channel between the receiver and the sender. To encrypt a message, the MAC system uses an algorithm, which uses a symmetric key and the plain text message being sent. The MAC algorithm then generates authentication tags of a fixed length by processing the message. The resulting computation is the message's MAC.

This MAC is then appended to the message and transmitted to the receiver. The receiver computes the MAC using the same algorithm. If the resulting MAC the receiver arrives at equals the one sent by the sender, the message is verified as authentic, legitimate, and not tampered with.

In effect, MAC uses a secure key only known to the sender and the recipient. Without this information, the recipient will not be able to open, use, read, or even receive the data being sent. If the data is to be altered between the time the sender initiates the transfer and when the recipient receives it, the MAC information will also be affected. 

Therefore, when the recipient attempts to verify the authenticity of the data, the key will not work, and the end result will not match that of the sender. When this kind of discrepancy is detected, the data packet can be discarded, protecting the recipient’s system.

https://www.fortinet.com/resources/cyberglossary/message-authentication-code#:~:text=Message%20Authentication%20Code%20(MAC)%2C,from%20one%20person%20to%20another.

## Types of Message Authentication Codes?

Although all MACs accomplish the same end objective, there are a few different types.

1. One-time MAC
   A one-time MAC is a lot like one-time encryption in that a MAC algorithm for a single use is defined to secure the transmission of data. One-time MACs tend to be faster than other authentication algorithms.

2. Carter-Wegman MAC
   A Carter-Wegman MAC is similar to a one-time MAC, except it also incorporates a pseudorandom function that makes it possible for a single key to be used many times over.

3. HMAC
   With a Keyed-Hash Message Authentication Code (HMAC) system, a one-way hash is used to create a unique MAC value for every message sent. The input parameters can have various values assigned, and making them very different from each other may produce a higher level of security.

## Approved Message Authentication Code Algorithms

The approved general-purpose MAC algorithms are HMAC, KECCAK Message Authentication Code (KMAC), and Cipher-based Method Authentication Code (CMAC). Message authentication in cryptography depends on hashes, which are used to verify the legitimacy of the transmission, ensuring the message has not been altered or otherwise corrupted since it was first transmitted by the sender.

Keyed-Hash Message Authentication Code (HMAC)
The HMAC is based on an approved hash function. It performs a function similar to that of the Rivest-Shamir-Adelman (RSA) cryptosystem, which is one of the oldest methods of sending data securely. The functions that can be used in HMAC are outlined in the following publications:

FIPS 180-4, Secure Hash Standard
FIPS 202, SHA-3 Standard: Permutation-Based Hash and Extendable-Output Functions
Guidelines regarding HMAC’s security are outlined in NIST SP 800-107 Revision 1, Recommendation for Applications Using Approved Hash Algorithms.

KECCAK Message Authentication Code (KMAC)
KMACs consist of keyed cryptographic algorithms, and their parameters are specified in FIPS 202, SHA-3 Standard: Permutation-Based Hash and Extendable-Output Functions. Two variants of KECCAK exist: KMAC256 and KMAC128.

The CMAC Mode for Authentication
As outlined in SP 800-38B, Recommendation for Block Cipher Modes of Operation: The CMAC Mode for Authentication, CMAC is built using an approved block cipher, which is an algorithm that uses a symmetric encryption key, similar to the NIST’s Advanced Encryption Standard (AES), which also uses a symmetric key and was used to guard classified information by the U.S. government.

https://www.fortinet.com/resources/cyberglossary/message-authentication-code

## What Are the Benefits of Message Authentication Codes?

1. Protects Data Integrity
   With MACs, you can make sure that unauthorized code, such as executable codes used by viruses, has not been put into your system. This is useful when trying to combat viruses and other malware.

2. Detects Changes in the Message Content
   You can use an application to generate a MAC based on data that has been sent to you or provided via a storage device. After the application generates a MAC, it can be compared to the original one to detect changes to the data.
   
https://www.fortinet.com/resources/cyberglossary/message-authentication-code

## HMAC

In cryptography, an HMAC (sometimes expanded as either keyed-hash message authentication code or hash-based message authentication code) is a specific type of message authentication code (MAC) involving a cryptographic hash function and a secret cryptographic key.

HMAC does not encrypt the message. Instead, the message (encrypted or not) must be sent alongside the HMAC hash. Parties with the secret key will hash the message again themselves, and if it is authentic, the received and computed hashes will match.

HMAC can provide authentication using a shared secret instead of using digital signatures with asymmetric cryptography. It trades off the need for a complex public key infrastructure by delegating the key exchange to the communicating parties.

https://en.wikipedia.org/wiki/HMAC

## message digest

A message digest is a numeric representation of a message that is created by a cryptographic hash function. The message digest is a fixed size regardless of the size of the message. The same message will always result in the same message digest. 

https://www.ibm.com/docs/en/ibm-mq/7.5?topic=concepts-message-digests

## SHA vs AES

SHA isn't encryption, it's a one-way hash function. AES (Advanced_Encryption_Standard) is a symmetric encryption standard.

https://stackoverflow.com/questions/990705/whats-the-difference-between-sha-and-aes-encryption

## php implementation

hash('sha256', $canonicalRequest)

hash_hmac('sha256', $date, $kSecret, true)

openssl_encrypt($string, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv)

## SHA

The Secure Hash Algorithms are a family of cryptographic hash functions published by the National Institute of Standards and Technology (NIST) as a U.S. Federal Information Processing Standard (FIPS), including:

SHA-0: A retronym applied to the original version of the 160-bit hash function published in 1993 under the name "SHA". It was withdrawn shortly after publication due to an undisclosed "significant flaw" and replaced by the slightly revised version SHA-1.
SHA-1: A 160-bit hash function which resembles the earlier MD5 algorithm. This was designed by the National Security Agency (NSA) to be part of the Digital Signature Algorithm. Cryptographic weaknesses were discovered in SHA-1, and the standard was no longer approved for most cryptographic uses after 2010.
SHA-2: A family of two similar hash functions, with different block sizes, known as SHA-256 and SHA-512. They differ in the word size; SHA-256 uses 32-bit words where SHA-512 uses 64-bit words. There are also truncated versions of each standard, known as SHA-224, SHA-384, SHA-512/224 and SHA-512/256. These were also designed by the NSA.
SHA-3: A hash function formerly called Keccak, chosen in 2012 after a public competition among non-NSA designers. It supports the same hash lengths as SHA-2, and its internal structure differs significantly from the rest of the SHA family.
The corresponding standards are FIPS PUB 180 (original SHA), FIPS PUB 180-1 (SHA-1), FIPS PUB 180-2 (SHA-1, SHA-256, SHA-384, and SHA-512). NIST has updated Draft FIPS Publication 202, SHA-3 Standard separate from the Secure Hash Standard (SHS).

https://en.wikipedia.org/wiki/Secure_Hash_Algorithms

## AES

The Advanced Encryption Standard (AES), also known by its original name Rijndael (Dutch pronunciation: [ˈrɛindaːl]),[5] is a specification for the encryption of electronic data established by the U.S. National Institute of Standards and Technology (NIST) in 2001.[6]

https://en.wikipedia.org/wiki/Advanced_Encryption_Standard

## md5($str) vs hash('md5', $str)

1. the result generated are the same

         $str = 'Hello World!';
         var_dump(md5($str));
         var_dump(hash('md5', $str));
         var_dump(md5($str) === hash('md5', $str));
      
         string(32) "ed076287532e86365e841e92bfc50d8c"
         string(32) "ed076287532e86365e841e92bfc50d8c"
         bool(true)

2. md5 is platform agnostic, which means if you generate message digest on a bash script on one and php script on another computer, the result are still the same.

https://stackoverflow.com/questions/8996839/are-all-md5-hashes-the-same

3. performance are different

the md5() function is about 3 times slower than the equivalent hash() function.

https://stackoverflow.com/questions/15500026/why-is-hashmd5-string-faster-than-md5string

