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

## Reusable components

The OpenAPI Specification has a solution – reusable components that can be used across multiple endpoints in the same API. These components are defined in the global components section and then are referenced in individual endpoints. 

Schemas
The schemas subsection of the global components section can contain various data models consumed and returned by the API. 

Parameters and Responses
The components section also has subsections for storing reusable parameters and responses. The subsections are parameters and responses.

### $ref: must be string(JSON-Ref)

        $ref: #/components/schemas/Account
        
to

        $ref: '#/components/schemas/Account'

https://support.smartbear.com/swaggerhub/docs/tutorials/openapi-3-tutorial.html#reuse

## http status code

http status code can have quote or not. quote is optional.

        responses: 
                200:
                  description: successfully create a new account

or

        responses: 
                '200':
                  description: successfully create a new account

## what does "content" : mean in swagger/openapi "responses":

content means that the response has a body and specifies the media type (JSON/XML/etc.) and structure of the response body.

https://stackoverflow.com/questions/45697667/what-does-content-mean-in-swagger-openapi-responses
