# JWT

## does it make sense to store jwt in adatabase

JWTs do not need to be stored on the server side. When you create a JWT, you encrypt it using a secret - think of this as the "password." Then you send it to the client where it can be stored.

When the client makes a request, it sends the JWT along with it. On the server side, you can then decrypt it using the same secret. If the secret does not work, you know it is an invalid JWT.

For obvious reasons, your JWT secret should be kept secret! The best way to do this is to store it as an environment variable.

https://stackoverflow.com/questions/42763146/does-it-make-sense-to-store-jwt-in-a-database  
https://stackoverflow.com/questions/42968048/where-should-i-store-jwt-token-for-authentication-on-server-side  

## jwt expiration

https://gist.github.com/soulmachine/b368ce7292ddd7f91c15accccc02b8df  
