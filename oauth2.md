# OAuth2.0

## framework

https://tools.ietf.org/html/rfc6749  

## protocol flow

<img width="632" alt="Screenshot 2023-03-08 at 21 41 44" src="https://user-images.githubusercontent.com/1209204/223728211-c1203d4f-fc88-41bb-a92e-c0c13f9905d2.png">

<img width="734" alt="Screenshot 2023-03-08 at 21 43 43" src="https://user-images.githubusercontent.com/1209204/223728697-ceabf7ef-1e36-4624-a772-8ede94e9b375.png">

## Authorization Code Grant Types

The Authorization Code grant type is used by confidential and public clients to exchange an authorization code for an access token.

After the user returns to the client via the redirect URL, the application will get the authorization code from the URL and use it to request an access token.

<img width="705" alt="Screenshot 2023-03-08 at 21 44 23" src="https://user-images.githubusercontent.com/1209204/223728788-8ba8e559-a96f-4c89-abe5-44513fd3c7fe.png">

## Grant models

1. access service website
2. through marketplace
3. through seller center management backend

![Image](https://github.com/lz2510/Tech/assets/1209204/4e0aa5cd-7eaf-455f-80bd-f1d201ab8f16)

https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5a

### Authorization Request

GET /authorize?response_type=code&client_id=s6BhdRkqt3&state=xyz  
        &redirect_uri=https%3A%2F%2Fclient%2Eexample%2Ecom%2Fcb HTTP/1.1  
Host: server.example.com  

### Authorization Response

HTTP/1.1 302 Found  
Location: https://client.example.com/cb?code=SplxlOBeZQQYbYS6WxSbIA  
          &state=xyz  

#### Login with Amazon (LWA) implementation

#### request

https://sellercentral.amazon.com/apps/authorize/consent?application_id=appidexample&state=stateexample&version=beta           

#### response

https://client-example.com?state=state-example&mws_auth_token=mwsauthtokenexample&selling_partner_id=sellingpartneridexample&spapi_oauth_code=spapioauthcodeexample  

https://developer-docs.amazon.com/sp-api/docs/website-authorization-workflow#step-2-the-selling-partner-consents-to-authorize-the-application  

### tiktok implemenation

#### request

service_id = '7172**********70150' //your service Id  
state = ' 123abs'//your origin state  
//expect url  below, trim the space  
https://services.tiktokshop.com/open/authorize?service_id=7172**********70150&state=123abs

#### response

{redirect_url}?code=FeBoANmHP3yqdoUI9fZOCw&state={the state you send}

### Access Token Request 

POST /token HTTP/1.1  
Host: server.example.com  
Authorization: Basic czZCaGRSa3F0MzpnWDFmQmF0M2JW  
Content-Type: application/x-www-form-urlencoded  

grant_type=authorization_code&code=SplxlOBeZQQYbYS6WxSbIA  
&redirect_uri=https%3A%2F%2Fclient%2Eexample%2Ecom%2Fcb  

### Access Token Response

HTTP/1.1 200 OK  
Content-Type: application/json;charset=UTF-8  
Cache-Control: no-store  
Pragma: no-cache  

{  
 "access_token":"2YotnFZFEjr1zCsicMWpAA",  
 "token_type":"example",  
 "expires_in":3600,  
 "refresh_token":"tGzv3JOkF0XG5Qx2TlKWIA",  
 "example_parameter":"example_value"  
}  

https://oauth.net/2/grant-types/authorization-code/  
https://datatracker.ietf.org/doc/html/rfc6749#autoid-35  

#### comparision between aws and tiktok

get token and refresh token, aws use post while tiktok uses get. post is safer.

#### Login with Amazon (LWA) implementation

##### request

POST /auth/o2/token HTTP/l.l  
Host: api.amazon.com  
Content-Type: application/x-www-form-urlencoded;charset=UTF-8  
grant_type=authorization_code&code=SplxlOexamplebYS6WxSbIA&client_id=foodev&client_secret=Y76SDl2F  

##### response

HTTP/l.l 200 OK  
Content-Type: application/json;  
charset UTF-8  
Cache-Control: no-store  
Pragma: no-cache  
{  
  "access_token":"Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR",  
  "token_type":"bearer",  
  "expires_in":3600,  
  "refresh_token":"Atzr|IQEBLzAtAhexamplewVz2Nn6f2y-tpJX2DeX"  
}  

#### tiktok implementation



##### request

GET /api/v2/token/get  
auth.tiktok-shops.com/api/v2/token/get?app_key=abcd&auth_code=123&app_secret=3a2cfe3b695026add413bb801baaf773f6a371be&grant_type=authorized_code  

GET /api/v2/token/refresh  
auth.tiktok-shops.com/api/v2/token/refresh?app_key=abcd&app_secret=3a2cfe3b695026add413bb801baaf773f6a371be&grant_type=refresh_token  

https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5a  

### redirect_url

no redirect url in amazon,as it’s config in backend. It’s safter than put redirect url on get url. it uses client if and client secret to authenticate client identity.use application if to identify which application.
tiktok use app key and app secret 

### code

Code is critical, should be used safely. The code expires in short time, such as aws is five minutes while tiktok is 30 min. Additionally tiktok add only used once limitation.

spapi_oauth_code in aws

Note: An LWA authorization code expires after five minutes. Be sure to exchange it for an LWA refresh token before it expires.

code in tiktok

If requests are accepted, users will be redirected to the url with a temporary code(auth code). This code will be expired in 30 min and can only be used once.

https://developer-docs.amazon.com/sp-api/docs/website-authorization-workflow#step-4-your-application-exchanges-the-lwa-authorization-code-for-a-lwa-refresh-token  
https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5a#3.Users%20are%20redirected%20to%20your%20site%20and%20get%20auth%20code  

### state

state is used to add more secure 

A state value generated by your application. Your application uses this value to maintain state between this request and the response, helping to guard against cross-site request forgery attacks.

Important: Because OAuth information is passed via URL query parameters, we highly recommended that you do the following: 1) Ensure that the state token is short-lived and verifiably unique to your user, and 2) Set the Referrer-Policy: no-referrer HTTP header, which prevents leaking sensitive information to websites that your website links to. For more information about cross-site request forgery and calculating a state parameter, see Cross-site Request Forgery in the Login with Amazon documentation.

An unguessable random string for protecting against cross-site request forgery attacks. Please encode it and Trim Space!  

## Access Token

An OAuth Access Token is a string that the OAuth client uses to make requests to the resource server.

Access tokens do not have to be in any particular format, and in practice, various OAuth servers have chosen many different formats for their access tokens.

Access tokens may be "bearer tokens".

https://oauth.net/2/access-tokens/  

## Client Authentication Grant Types

Confidential clients authenticate when making requests to the OAuth authorization server.

The core OAuth 2.0 specification defines the "client password" client authentication type, which defines the client_secret parameter as well as the method of including the client password in the HTTP Authorization header.

https://oauth.net/2/client-authentication/  

### Login with Amazon (LWA) implementation

client_credentials. Use this for calling grantless operations. When specifying this value, include the scope parameter.  

POST /auth/o2/token HTTP/l.l  
Host: api.amazon.com  
Content-Type: application/x-www-form-urlencoded;charset=UTF-8  
grant_type=client_credentials  
&scope=sellingpartnerapi::notifications  
&client_id=foodev  
&client_secret=Y76SDl2F  

https://developer-docs.amazon.com/sp-api/docs/connecting-to-the-selling-partner-api  

## Refresh Token

An OAuth Refresh Token is a string that the OAuth client can use to get a new access token without the user's interaction.

The refresh token exists to enable authorization servers to use short lifetimes for access tokens without needing to involve the user when the token expires.

POST /token HTTP/1.1  
Host: server.example.com  
Authorization: Basic czZCaGRSa3F0MzpnWDFmQmF0M2JW  
Content-Type: application/x-www-form-urlencoded  

grant_type=refresh_token&refresh_token=tGzv3JOkF0XG5Qx2TlKWIA  
     
https://oauth.net/2/refresh-tokens/  
https://datatracker.ietf.org/doc/html/rfc6749#autoid-57  

### Login with Amazon (LWA) implementation

#### request

POST /auth/o2/token HTTP/l.l  
Host: api.amazon.com  
Content-Type: application/x-www-form-urlencoded;charset=UTF-8  
grant_type=refresh_token  
&refresh_token=Aztr|...  
&client_id=foodev  
&client_secret=Y76SDl2F  

#### response

HTTP/l.l 200 OK  
Content-Type: application/json;charset UTF-8  
Cache-Control: no-store  
Pragma:no-cache  
{  
  "access_token":"Atza|IQEBLjAsAhRmHjNgHpi0U-Dme37rR6CuUpSREXAMPLE",  
  "token_type":"bearer",  
  "expires_in":3600,  
  "refresh_token":"Atzr|IQEBLzAtAhRPpMJxdwVz2Nn6f2y-tpJX2DeXEXAMPLE"  
}  

https://developer-docs.amazon.com/sp-api/docs/connecting-to-the-selling-partner-api#step-1-request-a-login-with-amazon-access-token  

### Refresh Token Rotation

There'are two strategy.

1. Refresh token doesn't change every get new token. Refresh token is long term, for example tiktok is 1 year.  It will expire after a fixed period, no matter if client is active such as getting new token or not.

2. Refresh token changes every get new token.

Strategy of frequently replacing refresh tokens to minimize vulnerability. With refresh token rotation, every time your application exchanges a refresh token to get a new access token, Auth0 also returns a new refresh token.

![rtr-state-diagram](https://github.com/lz2510/Tech/assets/1209204/e4b1f760-6171-4b88-82e4-63459d816058)

How should we be using refresh tokens?

The specifics of how refresh token rotation is implemented can vary, but in general the rotation ensures that each time a refresh token is used to request a new access token, the authorization server will return a new access token as well as a new refresh token. When refresh tokens are being rendered invalid more frequently, the risk of replay attacks will decrease significantly.

https://dev.to/jobber/refresh-token-rotation-what-why-and-how-2eh  
https://stackoverflow.com/questions/69314616/how-do-i-implement-refresh-token-rotation  
https://auth0.com/docs/secure/tokens/refresh-tokens/refresh-token-rotation  

### How about refresh token expired

If a refresh token expires for any reason, then the only action the application can take is to ask the user to log in again, starting a new OAuth flow from scratch, which will issue a new access token and refresh token to the application.

https://www.oauth.com/oauth2-servers/making-authenticated-requests/refreshing-an-access-token/  
https://stackoverflow.com/questions/40555855/does-the-refresh-token-expire-and-if-so-when  

## grant_type

They have the same url: https://api.amazon.com/auth/o2/token

The type of access grant requested. Values have 3 as below:

1. authorization_code. The type of access grant requested. Must be authorization_code.

2. refresh_token. Use this for calling operations that require authorization from a selling partner. All operations that are not grantless operations require authorization from a selling partner. When specifying this value, include the rrefresh_token parameter.

3. client_credentials. Use this for calling grantless operations. When specifying this value, include the scope parameter.

https://developer-docs.amazon.com/sp-api/docs/website-authorization-workflow#step-4-your-application-exchanges-the-lwa-authorization-code-for-a-lwa-refresh-token  
https://developer-docs.amazon.com/sp-api/docs/connecting-to-the-selling-partner-api#step-1-request-a-login-with-amazon-access-token  

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

### Bear vs Basic Token in detail

1. Access Authentication Framework

HTTP provides a simple challenge-response authentication mechanism that MAY be used by a server to challenge a client request and by a client to provide authentication information.

      auth-scheme    = token
      auth-param     = token "=" ( token | quoted-string )

challenge   = auth-scheme 1*SP 1#auth-param
credentials = auth-scheme #auth-param

Note: auth-scheme is a token, like Basic, Bearer. 
challenge is for server to send response. 
credentials is for client to send request.
auth-param uses token "=" ( token | quoted-string ) like attribute-value pairs. but in basic and bearer, only use value. like "Basic" basic-credentials, "Bearer" 1*SP b64token. Doc is here Note that, as with Basic, it does not conform to the generic syntax defined in Section 1.2 of [RFC2617] 

2. Basic Authentication Scheme
For Basic, the framework above is utilized as follows:

      credentials = "Basic" basic-credentials

      basic-credentials calculation is as below:
      basic-credentials = base64-user-pass
      base64-user-pass  = <base64 [4] encoding of user-pass,
      user-pass   = userid ":" password
      userid      = *<TEXT excluding ":">
      password    = *TEXT

3. Bearer Authentication Scheme
The syntax for Bearer credentials is as follows:

     b64token    = 1*( ALPHA / DIGIT /
                       "-" / "." / "_" / "~" / "+" / "/" ) *"="
     credentials = "Bearer" 1*SP b64token

https://www.rfc-editor.org/rfc/rfc2617#section-2.1  
https://www.rfc-editor.org/rfc/rfc6750#section-2.1  
https://www.rfc-editor.org/rfc/rfc7617  
