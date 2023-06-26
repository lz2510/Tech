# Restful API

## API benefits

- APIs provide **information hiding**: neither side of the API (the provider and the consumer) know the implementation details of the other one. As long as both adhere to the API, they can be changed as much as needed without the other party even noticing.

- APIs are also called **Contracts**, because they are assumed to be unbreakable: The provider promises not to change its API and to keep honoring it in the years to come. With this promise in hand consumers can start developing their parts and rely on the functionality offered up by the API with confidence.

https://oai.github.io/Documentation/introduction.html  

## restful

https://github.com/microsoft/api-guidelines
https://docs.gitlab.com/ee/api/invitations.html

## Use hyphens or underscores to separate words

Use hyphens or underscores to separate words: Hyphens and underscores are both acceptable ways to separate words in resource URIs. For example, /blog-posts or /blog_posts are both valid URIs.

https://medium.com/@bubu.tripathy/best-practices-for-designing-rest-apis-5b1809545e3c

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

