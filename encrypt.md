# Encryption

## hashing vs encryption

Generally hashing and encryption are for two different things. The main distinction in your case is that hashing is one way, and encryption is two-way. That is, you can decrypt the password to get them in plain text, but you cannot "de-hash" something.

If your system gets compromised and you are using encryption, the attacker will probably have all the information needed to decrypt all the passwords. This is obviously not good. If you hashed the password, even if the attacker got access to the hashed password and seed, they could not get the plain-text password.

For this reason, it's better to hash the password instead of encrypting it. Of course, this assumes you are doing the hashing correctly. Look into something like bcrypt to do this for you.

So what exactly is encryption used for? 

In general, hashing is for maintaining integrity, while encryption is for maintaining confidentiality. So you would use encryption to make sure that nobody can intercept and read your data while it's being transfered between two places. In the case of storage, you want the thing you use to be one-way, so that's why encryption is not appropriate.

https://security.stackexchange.com/questions/15553/what-is-better-salted-hash-or-openssl-encryption
