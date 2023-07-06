# JWT

## What are JSON Web Tokens?

JSON Web Tokens (JWT), pronounced “jot”, are a standard since the information they carry is transmitted via JSON. We can read more about the draft, but that explanation isn’t the most pretty to look at.

**JSON Web Tokens work across different programming languages:** JWTs work in .NET, Python, Node.js, Java, PHP, Ruby, Go, JavaScript, and Haskell. So you can see that these can be used in many different scenarios.

**JWTs are self-contained:** They will carry all the information necessary within itself. This means that a JWT will be able to transmit basic information about itself, a payload (usually user information), and a signature.

**JWTs can be passed around easily:** Since JWTs are self-contained, they are perfectly used inside an HTTP header when authenticating an API. You can also pass it through the URL.

## What does a JWT look like?

A JWT is easy to identify. It is three strings separated by .

For example:

  aaaaaaaaaa.bbbbbbbbbbb.cccccccccccc
  
Let’s break down the 3 parts and see what each contains.

## Breaking Down a JSON Web Token

Since there are 3 parts separated by a ., each section is created differently. We have the 3 parts which are:

- header
- payload
- signature

### Header

The header carries 2 parts:

declaring the type, which is JWT
the hashing algorithm to use (HMAC SHA256 in this case)
Here’s an example:

    {
      "typ": "JWT",
      "alg": "HS256"
    }
    
Now once this is base64encode, we have the first part of our JSON web token!

    eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9

### Payload

The payload will carry the bulk of our JWT, also called the JWT Claims. This is where we will put the information that we want to transmit and other information about our token.

There are multiple claims that we can provide. This includes registered claim names, public claim names, and private claim names.

Registered Claims

Claims that are not mandatory whose names are reserved for us. These include:

iss: The issuer of the token
sub: The subject of the token
aud: The audience of the token
exp: This will probably be the registered claim most often used. This will define the expiration in NumericDate value. The expiration MUST be after the current date/time.
nbf: Defines the time before which the JWT MUST NOT be accepted for processing
iat: The time the JWT was issued. Can be used to determine the age of the JWT
jti: Unique identifier for the JWT. Can be used to prevent the JWT from being replayed. This is helpful for a one-time use token.
Public Claims

These are the claims that we create ourselves like user name, information, and other important information.

Private Claims

A producer and consumer may agree to use claim names that are private. These are subject to collision, so use them with caution.

#### Example Payload

Our example payload has two registered claims (iss, and exp) and two public claims (name, admin).

    {
      "iss": "scotch.io",
      "exp": 1300819380,
      "name": "Chris Sevilleja",
      "admin": true
    }
    
This will encode to:

    eyJpc3MiOiJzY290Y2guaW8iLCJleHAiOjEzMDA4MTkzODAsIm5hbWUiOiJDaHJpcyBTZXZpbGxlamEiLCJhZG1pbiI6dHJ1ZX0
    
That will be the second part of our JSON Web Token.

### Signature

The third and final part of our JSON Web Token is going to be the signature. This signature is made up of a hash of the following components:

the header
the payload
secret
This is how we get the third part of the JWT:

    var encodedString = base64UrlEncode(header) + "." + base64UrlEncode(payload);

    HMACSHA256(encodedString, 'secret');
    
The secret is the signature held by the server. This is the way that our server will be able to verify existing tokens and sign new ones.

This gives us the final part of our JWT.

    03f329983b86f7d9a9f5fef85305880101d5e302afafa20154d094b229f75773
    
Now we have our full JSON Web Token:

    eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzY290Y2guaW8iLCJleHAiOjEzMDA4MTkzODAsIm5hbWUiOiJDaHJpcyBTZXZpbGxlamEiLCJhZG1pbiI6dHJ1ZX0.03f329983b86f7d9a9f5fef85305880101d5e302afafa20154d094b229f75773
Auth0 has created a great site to go through and test out how JWTs are made. You can see as you change the content on the fly, you are able to see the JWT get updated immediately. Auth0 provides great tools and they also maintain the jsonwebtoken Node package to handle creating and verifying JWTs in Node.

https://www.digitalocean.com/community/tutorials/the-anatomy-of-a-json-web-token

## does it make sense to store jwt in adatabase

JWTs do not need to be stored on the server side. When you create a JWT, you encrypt it using a secret - think of this as the "password." Then you send it to the client where it can be stored.

When the client makes a request, it sends the JWT along with it. On the server side, you can then decrypt it using the same secret. If the secret does not work, you know it is an invalid JWT.

For obvious reasons, your JWT secret should be kept secret! The best way to do this is to store it as an environment variable.

https://stackoverflow.com/questions/42763146/does-it-make-sense-to-store-jwt-in-a-database  
https://stackoverflow.com/questions/42968048/where-should-i-store-jwt-token-for-authentication-on-server-side  

## jwt expiration

https://gist.github.com/soulmachine/b368ce7292ddd7f91c15accccc02b8df  
