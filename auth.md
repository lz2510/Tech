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
https://cloud.google.com/blog/products/api-management/5-ways-to-implement-rest-api-authentication  

## API keys

https://cloud.google.com/docs/authentication/api-keys  
https://swagger.io/docs/specification/authentication/api-keys/  

## Oauth

[OAuth2.0](oauth2.md)

## JWT

[JWT](jwt.md)

## aws

1. The authorization model for the Selling Partner API is based on Login with Amazon, Amazon's implementation of OAuth 2.0. 

2. For S3 and SQS, It uses IAM or other models.

2.1 we use sdk to do auth.

2.2 In Postman, on the Authorization tab, do the following:
For Type, choose AWS Signature.
For AccessKey and SecretKey, enter the IAM access key ID and secret access key for an IAM user. The IAM user must be in the IAM group that has access to your API.

https://repost.aws/knowledge-center/iam-authentication-api-gateway  
https://aws.amazon.com/blogs/compute/evaluating-access-control-methods-to-secure-amazon-api-gateway-apis/  
https://developer-docs.amazon.com/sp-api/docs/authorizing-selling-partner-api-applications  
https://developer.amazon.com/docs/login-with-amazon/authorization-code-grant.html


