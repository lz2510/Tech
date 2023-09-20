# OpenAPI

## tutorial, guideline and specification

https://support.smartbear.com/swaggerhub/docs/tutorials/openapi-3-tutorial.html  
https://swagger.io/docs/specification/about/  
https://swagger.io/specification/v3/  
https://spec.openapis.org/oas/latest.html  

## What Is OpenAPI?

OpenAPI Specification (formerly known as Swagger Specification) is an open-source format for describing and documenting APIs. It has since become a de-facto standard for designing and describing RESTful APIs, and is used by millions of developers and organizations for developing their APIs, be it internal or client facing.

## format

The latest version of OpenAPI is 3.0. OpenAPI definitions can be written in JSON or YAML. We recommend YAML, because it is easier to read and write.

## Parameters

RESTful parameters specify the variable part of the resource a user works with. If you want to get some advanced information on parameters, see Describing Parameters.

### Query parameters

Query parameters are the most common type of parameters. They appear at the end of a URL following a question mark. Query parameters are optional and non unique, so they can be specified multiple times in the URL. It is a non-hierarchical component of the URL.

    parameters:
            - name: limit
              in: query

### Request body

POST, PUT and PATCH requests typically contain the request body. The request body is defined by using the requestBody object. For this API, let’s add the ability for a user to post an artist to our database. This would be under the /artists resource.

    requestBody:
            required: true

### Path parameters

The path parameters can be used to isolate a specific component of the data that the client is working with, for example, https://example.io/v1/artists/{username}. Path parameters are part of the hierarchical component of the URL, and are thus stacked sequentially.

In OpenAPI, a path parameter is defined using in: path. The parameter name must be the same as specified in the path. Also remember to add required: true, because path parameters are always required. 


    parameters:
            - name: username
              in: path
              required: true

https://support.smartbear.com/swaggerhub/docs/tutorials/openapi-3-tutorial.html#create-api  
https://swagger.io/docs/specification/describing-parameters/  

