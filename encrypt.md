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
