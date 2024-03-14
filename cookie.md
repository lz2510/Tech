# Cookie

## Two types of Cookie

- permanent cookie
- session cookie

## HttpOnly

A cookie with the HttpOnly attribute is inaccessible to the JavaScript Document.cookie API; it's only sent to the server. For example, cookies that persist in server-side sessions don't need to be available to JavaScript and should have the HttpOnly attribute. This precaution helps mitigate cross-site scripting (XSS) attacks.

Here's an example:

HTTP
Copy to Clipboard
Set-Cookie: id=a3fWa; Expires=Thu, 21 Oct 2021 07:28:00 GMT; Secure; HttpOnly

## SameSite attribute

The SameSite attribute lets servers specify whether/when cookies are sent with cross-site requests (where Site is defined by the registrable domain and the scheme: http or https). This provides some protection against cross-site request forgery attacks (CSRF). It takes three possible values: Strict, Lax, and None.

With Strict, the browser only sends the cookie with requests from the cookie's origin site. Lax is similar, except the browser also sends the cookie when the user navigates to the cookie's origin site (even if the user is coming from a different site). For example, by following a link from an external site. None specifies that cookies are sent on both originating and cross-site requests, but only in secure contexts (i.e., if SameSite=None then the Secure attribute must also be set). If no SameSite attribute is set, the cookie is treated as Lax.

Here's an example:

HTTP
Copy to Clipboard
Set-Cookie: mykey=myvalue; SameSite=Strict

## Vary

The Vary HTTP response header describes the parts of the request message aside from the method and URL that influenced the content of the response it occurs in. Most often, this is used to create a cache key when content negotiation is in use.

https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies
