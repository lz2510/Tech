# OAuth2.0

## framework

https://tools.ietf.org/html/rfc6749  

## protocol flow

<img width="632" alt="Screenshot 2023-03-08 at 21 41 44" src="https://user-images.githubusercontent.com/1209204/223728211-c1203d4f-fc88-41bb-a92e-c0c13f9905d2.png">

<img width="734" alt="Screenshot 2023-03-08 at 21 43 43" src="https://user-images.githubusercontent.com/1209204/223728697-ceabf7ef-1e36-4624-a772-8ede94e9b375.png">

<img width="705" alt="Screenshot 2023-03-08 at 21 44 23" src="https://user-images.githubusercontent.com/1209204/223728788-8ba8e559-a96f-4c89-abe5-44513fd3c7fe.png">


## Access Token

An OAuth Access Token is a string that the OAuth client uses to make requests to the resource server.

Access tokens do not have to be in any particular format, and in practice, various OAuth servers have chosen many different formats for their access tokens.

Access tokens may be "bearer tokens".

https://oauth.net/2/access-tokens/  

## Refresh Token

An OAuth Refresh Token is a string that the OAuth client can use to get a new access token without the user's interaction.

https://oauth.net/2/refresh-tokens/  

### How about refresh token expired

If a refresh token expires for any reason, then the only action the application can take is to ask the user to log in again, starting a new OAuth flow from scratch, which will issue a new access token and refresh token to the application.

https://www.oauth.com/oauth2-servers/making-authenticated-requests/refreshing-an-access-token/#:~:text=If%20a%20refresh%20token%20expires,refresh%20token%20to%20the%20application.  

https://stackoverflow.com/questions/40555855/does-the-refresh-token-expire-and-if-so-when

## Grant Types

The Authorization Code grant type is used by confidential and public clients to exchange an authorization code for an access token.

After the user returns to the client via the redirect URL, the application will get the authorization code from the URL and use it to request an access token.

https://oauth.net/2/grant-types/authorization-code/  

## Client Authentication

Confidential clients authenticate when making requests to the OAuth authorization server.

The core OAuth 2.0 specification defines the "client password" client authentication type, which defines the client_secret parameter as well as the method of including the client password in the HTTP Authorization header.

https://oauth.net/2/client-authentication/  

## Bearer Token

Bearer Tokens are the predominant type of access token used with OAuth 2.0.

A Bearer Token is an opaque string, not intended to have any meaning to clients using it. Some servers will issue tokens that are a short string of hexadecimal characters, while others may use structured tokens such as JSON Web Tokens.

https://oauth.net/2/bearer-tokens/  
tools.ietf.org/html/rfc6750  

### Bearer Token vs Basic Token

The Basic and Digest authentication schemes are dedicated to the authentication using a username and a secret (see RFC7616 and RFC7617).

The Bearer authentication scheme is dedicated to the authentication using a token and is described by the RFC6750. Even if this scheme comes from an OAuth2 specification, you can still use it in any other context where tokens are exchange between a client and a server.

Concerning the JWT authentication and as it is a token, the best choice is the Bearer authentication scheme. Nevertheless, nothing prevent you from using a custom scheme that could fit on your requirements.

https://stackoverflow.com/questions/34013299/web-api-authentication-basic-vs-bearer  
