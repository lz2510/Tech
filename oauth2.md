# OAuth2.0

## framework

https://tools.ietf.org/html/rfc6749  

## Access Token

An OAuth Access Token is a string that the OAuth client uses to make requests to the resource server.

Access tokens do not have to be in any particular format, and in practice, various OAuth servers have chosen many different formats for their access tokens.

Access tokens may be "bearer tokens".

https://oauth.net/2/access-tokens/  

## Refresh Token

An OAuth Refresh Token is a string that the OAuth client can use to get a new access token without the user's interaction.

https://oauth.net/2/refresh-tokens/  

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
