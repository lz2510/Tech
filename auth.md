# Authentication & Authorization

## RESTful API authentication methods

RESTful API has four common authentication methods:

1. API keys

API keys are another option for REST API authentication. In this approach, the server assigns a unique generated value to a first-time client. Whenever the client tries to access resources, it uses the unique API key to verify itself. API keys are less secure because the client has to transmit the key, which makes it vulnerable to network theft.

2. OAuth

OAuth combines passwords and tokens for highly secure login access to any system. The server first requests a password and then asks for an additional token to complete the authorization process. It can check the token at any time and also over time with a specific scope and longevity.

3. HTTP authentication schema (Basic & Bearer)

HTTP defines some authentication schemes that you can use directly when you are implementing REST API. The following are two of these schemes:

3.1 Basic authentication

In basic authentication, the client sends the user name and password in the request header. It encodes them with base64, which is an encoding technique that converts the pair into a set of 64 characters for safe transmission.

3.2 Bearer authentication

The term bearer authentication refers to the process of giving access control to the token bearer. The bearer token is typically an encrypted string of characters that the server generates in response to a login request. The client sends the token in the request headers to access resources.

4. JWT authentication (json web token)

https://aws.amazon.com/what-is/restful-api/  
https://blog.hubspot.com/website/api-authentication  
