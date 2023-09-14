# Restful API

## API benefits

- APIs provide **information hiding**: neither side of the API (the provider and the consumer) know the implementation details of the other one. As long as both adhere to the API, they can be changed as much as needed without the other party even noticing.

- APIs are also called **Contracts**, because they are assumed to be unbreakable: The provider promises not to change its API and to keep honoring it in the years to come. With this promise in hand consumers can start developing their parts and rely on the functionality offered up by the API with confidence.

https://oai.github.io/Documentation/introduction.html  

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

## restful

https://github.com/microsoft/api-guidelines  
https://docs.gitlab.com/ee/api/invitations.html

## There are several best practices to keep in mind when designing a REST API:

1. Use HTTP methods correctly: Use HTTP methods (GET, POST, PUT, DELETE, etc.) as intended. For example, use GET for retrieving data, POST for creating a new resource, PUT for updating an existing resource, and DELETE for deleting a resource.
2. Use nouns for resource naming: Use nouns instead of verbs for resource naming. For example, use /products instead of /getProducts.
3. Use plural for collection resources: Use plural for collection resources. For example, use /products instead of /product.
4. Use specific names for resources: Use specific names for resources instead of generic ones. For example, use /users/{userId}/orders instead of /orders.
5. Use query parameters for filtering and sorting: Use query parameters for filtering and sorting data. For example, use /products?category=electronics&sort=price to get electronics products sorted by price.
6. Use HTTP status codes correctly: Use HTTP status codes correctly to indicate the status of a request. For example, use 200 for successful responses, 201 for resource creation, 400 for bad requests, 404 for resources not found, etc.
7. Use versioning for your API: Use versioning to manage changes to your API. For example, use /v1/products and /v2/products for different versions of the same resource.

https://shahedbd.medium.com/beginner-guide-to-rest-api-and-best-practices-b909e3cbea7

## Use hyphens or underscores to separate words

One says it's acceptable to use hyphens or underscores. Another says should NOT use hyphenated leading name-parts. So it's not recommended to use hyphens.

One oppion is that use hyphens or underscores to separate words: Hyphens and underscores are both acceptable ways to separate words in resource URIs. For example, /blog-posts or /blog_posts are both valid URIs.

The opposite is that the name of the API resource & document should NOT be namespaced with hyphenated leading name-parts; API paths, teams and groups should provide domain & sub-domain namespacing. e.g. /membership/v1/applications NOT membership-applications

https://medium.com/@bubu.tripathy/best-practices-for-designing-rest-apis-5b1809545e3c  
https://medium.com/api-center/api-documentation-rules-192c127cf401  

## Get parameter should be put in query string or request boyd?

All remaining request message fields shall map to the URL query parameters. There is no request body; 

https://cloud.google.com/apis/design/standard_methods  

## path params vs. query params

Best practice for RESTful API design is that path params are used to identify a specific resource or resources, while query parameters are used to sort/filter those resources.

GET /cars
GET /cars/:id

This way you are only using path parameters when you are specifying which resource to fetch, but this does not sort/filter the resources in any way.

Now suppose you wanted to add the capability to filter the cars by color in your GET requests. Because color is not a resource (it is a property of a resource), you could add a query parameter that does this. You would add that query parameter to your GET /cars request like this:

GET /cars?color=blue

This endpoint would be implemented so that only blue cars would be returned.

https://stackoverflow.com/questions/30967822/when-do-i-use-path-params-vs-query-params-in-a-restful-api  
https://swagger.io/docs/specification/describing-parameters/#:~:text=Path%20parameters%20are%20variable%20parts,denoted%20with%20curly%20braces%20%7B%20%7D%20.  

### Parameter Locations

There are four possible parameter locations specified by the in field:

path - Used together with Path Templating, where the parameter value is actually part of the operation’s URL. This does not include the host or base path of the API. For example, in /items/{itemId}, the path parameter is itemId.

query - Parameters that are appended to the URL. For example, in /items?id=###, the query parameter is id.

header - Custom headers that are expected as part of the request. Note that [RFC7230] states header names are case insensitive.

cookie - Used to pass a specific cookie value to the API.

https://spec.openapis.org/oas/latest.html

## Api versioning

### URI-based versioning

- https://www.my-webside.com/api/v1/users
- https://www.my-webside.com/api/v2/users

### Header-based versioning

#### Media type-based versioning

https://restfulapi.net/versioning/  
https://medium.com/mestredev/versioning-your-rest-api-with-laravel-646bcc1f70a4    
https://medium.com/@mukesh.ram/laravel-api-versioning-strategies-for-managing-api-versions-in-laravel-applications-69d388900d4  

## Nested collections and properties

Collection items MAY contain other collections. For example, a user collection MAY contain user resources that have multiple addresses:

    GET https://api.contoso.com/v1.0/people/123/addresses

https://github.com/microsoft/api-guidelines/blob/vNext/Guidelines.md#93-collection-url-patterns  

## pagination

### Server-driven paging

Paginated responses MUST indicate a partial result by including a continuation token in the response. The absence of a continuation token means that no additional pages are available.

For example, amazon selling partner uses NextToken to indicate if still has additional pages. And tiktok use more is false or true to do the same thing, but NextToken is safter.

### Client-driven paging

Clients MAY use $start and $offset query parameters to specify a number of results to return and an offset into the collection.

## Use Caching

Use HTTP caching headers: HTTP caching headers such as Cache-Control and ETag can help control how clients cache responses. By setting appropriate caching headers, you can ensure that clients cache responses for an appropriate length of time and avoid caching stale data.

    HTTP/1.1 200 OK
    Cache-Control: max-age=3600
    ETag: "abc123"
    
    {
      "id": 1234,
      "name": "John Doe",
      "email": "johndoe@example.com"
    }

https://medium.com/@bubu.tripathy/best-practices-for-designing-rest-apis-5b1809545e3c  

## Resource instance payloads should be substantially similar 

Resource instance payloads will be substantially similar across POST (request), PUT (request), GET (response) and PATCH (update), and SHOULD reference the same schema where possible. 

https://medium.com/api-center/api-documentation-rules-192c127cf401

## Http PUT

The HTTP PUT method is similar to the HTTP POST method in that it is used to send data to the server, but it differs in its semantics. 

In general, the PUT method should be idempotent, meaning that multiple identical PUT requests should have the same effect as a single PUT request. This means that if a client sends the same PUT request multiple times, the server should perform the update or replacement operation only once, and subsequent requests should have no further effect.

https://shahedbd.medium.com/beginner-guide-to-rest-api-and-best-practices-b909e3cbea7  
