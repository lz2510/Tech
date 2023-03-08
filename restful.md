# Restful API

## restful

https://docs.gitlab.com/ee/api/invitations.html

## Get parameter should be put in query string or request boyd?

All remaining request message fields shall map to the URL query parameters. There is no request body; 

https://cloud.google.com/apis/design/standard_methods  

## Api versioning
- https://www.my-webside.com/api/v1/users
- https://www.my-webside.com/api/v2/users

https://restfulapi.net/versioning/  
https://medium.com/mestredev/versioning-your-rest-api-with-laravel-646bcc1f70a4  

## Nested collections and properties

Collection items MAY contain other collections. For example, a user collection MAY contain user resources that have multiple addresses:

    GET https://api.contoso.com/v1.0/people/123/addresses

https://github.com/microsoft/api-guidelines/blob/vNext/Guidelines.md#93-collection-url-patterns  

## pagination
