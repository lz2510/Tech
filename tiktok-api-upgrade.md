# tiktok api upgrade

## Making requests

### add resouce type category

For example, product list api, product is category. and products is resource. order list api, order is category, and orders is resource.  
Note that category is singular and resource is plural. But in amazon order api, both category and resource orders are plural. So resource must be plural, but category can be plural or singular.
Anothe is verb is not necessary in the path when searching resource./orders/v0/orders is better, in /orders/v0/orders/search, search verb is not necessary.
tiktok:
/product/202309/products/search  
/order/202309/orders/search  

amazon:  
/orders/v0/orders  
/orders/v0/orders/{orderId}  

TikTok Shop API endpoints are organized by resource type.  
All TikTok Shop API endpoints follow this pattern:  
https://{domain}/{category}/{version}/{resource}  

old version: /api/products/search  
new version: /product/202309/products/search  

old version: /api/products/details  
new version: /product/202309/products/{product_id}  

old version: /api/orders/search  
new version: /order/202309/orders/search  

old version: /api/orders/detail/query  
new version: /order/202309/orders  

https://partner.tiktokshop.com/doc/page/63fd742b715d622a338c4bc2?external_id=63fd742b715d622a338c4bc2#Back%20To%20Top  
https://partner.tiktokshop.com/docv2/page/6503081a56e2bb0289dd6d7d?external_id=6503081a56e2bb0289dd6d7d  
https://partner.tiktokshop.com/doc/page/64a2797f4b474b0283d38e4b?external_id=64a2797f4b474b0283d38e4b  
https://partner.tiktokshop.com/docv2/page/6509d85b4a0bb702c057fdda?external_id=6509d85b4a0bb702c057fdda  
https://partner.tiktokshop.com/doc/page/649a5eeb38158c02a43fc6b5?external_id=649a5eeb38158c02a43fc6b5  
https://partner.tiktokshop.com/docv2/page/650aa8ccc16ffe02b8f167a0?external_id=650aa8ccc16ffe02b8f167a0  

### move resource id to path

Move resource id to path, and remove it from query or body, which depends on GET or POST.

#### get product detail:

old version: product_id is in the query, as is get.  
/api/products/details?product_id=1729592969712207008

new version: product_id is put in the path.  
/product/202309/products/{product_id}

#### ship package:

old version: package_id is in the body as is post.  
Path: /api/fulfillment/rts  
body:  
{  
"package_id": "123456"    
}

new version: package_id is in the path.  
Path: /fulfillment/202309/packages/{package_id}/ship

the same for other APIs.

#### get shipping label:

Path: /api/fulfillment/shipping_document  
package_id is in the query, as is get.  
/api/fulfillment/shipping_document?package_id=1152940335842821172

new version: package_id is in the path.  
Path: /fulfillment/202309/packages/{package_id}/shipping_documents

https://partner.tiktokshop.com/doc/page/64a2797f4b474b0283d38e4b?external_id=64a2797f4b474b0283d38e4b
https://partner.tiktokshop.com/docv2/page/6509d85b4a0bb702c057fdda?external_id=6509d85b4a0bb702c057fdda
https://partner.tiktokshop.com/doc/page/63fd7430715d622a338c4c52?external_id=63fd7430715d622a338c4c52
https://partner.tiktokshop.com/docv2/page/650aa4f1defece02be6e7cb1?external_id=650aa4f1defece02be6e7cb1#Back%20To%20Top
https://partner.tiktokshop.com/doc/page/63fd7430715d622a338c4c46?external_id=63fd7430715d622a338c4c46#Back%20To%20Top
https://partner.tiktokshop.com/docv2/page/650aa5fac16ffe02b8f112ca?external_id=650aa5fac16ffe02b8f112ca

### version number

To make requests to the 202309 API endpoints, use URIs with the new structure. Specify the version name (e.g. 202309) in the path instead of as a query parameter. The new version also introduces the resource identifier as a path parameter.

old version: query parameter
/api/orders/search?version=202212

new version: path parameter
/order/202309/orders/search

https://partner.tiktokshop.com/doc/page/63fd742f715d622a338c4c13?external_id=63fd742f715d622a338c4c13#Back%20To%20Top
https://partner.tiktokshop.com/docv2/page/650aa8094a0bb702c06df242?external_id=650aa8094a0bb702c06df242

### http method

old version: POST, retrieve data should use GET. new version is better.
Path: /api/orders/detail/query
Method: [POST]

new version: GET
Path: /order/202309/orders
Method: [GET]

https://partner.tiktokshop.com/doc/page/63fd742f715d622a338c4c13?external_id=63fd742f715d622a338c4c13#Back%20To%20Top
https://partner.tiktokshop.com/docv2/page/650aa8094a0bb702c06df242?external_id=650aa8094a0bb702c06df242

## Enumerate data types

We've improved the general concept of statuses to be more descriptive. Previously, order statuses were mapped to codes, which required developer interpretation. We have removed these int based codes, and developed string based ENUM statuses, such as "UNPAID" and "AWAITING_SHIPMENT" to simplify the development process.
For example:  

- v202305 of Get Order Detail API, order_status property values are in the int type: 100 mean UNPAID, 111 means AWAITING_SHIPMENT
- v202309 of Get Order Detail API, order_status property values are in the string type. UNPAID and AWAITING_SHIPMENT are returned from API.

old version: order_status: int type  
Available value:  
UNPAID = 100;  
ON_HOLD = 105; (currently ON_HOLD status is only available in the UK market)  
AWAITING_SHIPMENT = 111;  
AWAITING_COLLECTION = 112;  
PARTIALLY_SHIPPING = 114;  
IN_TRANSIT = 121;  
DELIVERED = 122;  
COMPLETED = 130;  
CANCELLED = 140;  

new version: order_status: string type  
Available value:  
- UNPAID: The order has been placed but payment has not been finished.  
- ON_HOLD: Payment has been finished, but order allow buyer to cancel without seller approval. Not allow seller fulfill order under ON_HOLD status.
- PARTIALLY_SHIPPING: One or more (but not all) items in the order have been shipped.
- AWAITING_SHIPMENT: Payment has been finished and order is ready for shipment, but no items in the order have been shipped.
- AWAITING_COLLECTION: Seller arranged shipment, but package is still waiting to handover the parcel to carrier.
- IN_TRANSIT: Package has been collected by the carrier.
- DELIVERED: Package delivered to buyer.
- COMPLETED: Order has been completed. Orders are not allowed to initiate return or refund anymore.
- CALCELLED: The order was canceled.

https://partner.tiktokshop.com/doc/page/649a5eeb38158c02a43fc6b5?external_id=649a5eeb38158c02a43fc6b5#Back%20To%20Top
https://partner.tiktokshop.com/docv2/page/650aa8ccc16ffe02b8f167a0?external_id=650aa8ccc16ffe02b8f167a0

## Pagination

For standardized expression and performance assurance, we have introduced token-based pagination into our API design. The v202309 API only supports pagination using the page_size and page_token parameters. The offset parameter is no longer supported.

page_tiken, Token of pagination  
- Should be empty on the first page  
- Get next page token from response  

get order list api:  
old version: page_size and cursor  
new version: page_size and page_token  

get product list api:  
old version: page_size and page_number  
new version: page_size and page_token  

search returns api:  
old version: size and offset  
new version: page_size and page_token  

https://partner.tiktokshop.com/doc/page/63fd742f715d622a338c4c13?external_id=63fd742f715d622a338c4c13#Back%20To%20Top
https://partner.tiktokshop.com/docv2/page/650aa8094a0bb702c06df242?external_id=650aa8094a0bb702c06df242#Back%20To%20Top
https://partner.tiktokshop.com/doc/page/63fd742b715d622a338c4bc2?external_id=63fd742b715d622a338c4bc2#Back%20To%20Top  
https://partner.tiktokshop.com/docv2/page/6503081a56e2bb0289dd6d7d?external_id=6503081a56e2bb0289dd6d7d  
https://partner.tiktokshop.com/doc/page/63fd7433715d622a338c4cb2?external_id=63fd7433715d622a338c4cb2  
https://partner.tiktokshop.com/docv2/page/650ab69edefece02be70785b?external_id=650ab69edefece02be70785b#Back%20To%20Top  

## Authorization

We have deprecated access_token usage in the query and now require it to be passed in the HTTP header x-tts-access-token for security improvement.

old version: access_token in query
new version: x-tts-access-token in header

Actuall in amazon api, the access_token x-amz-access-token is also put in header.  

https://partner.tiktokshop.com/doc/page/63fd743c715d622a338c4e5d#3.Public%20Request%20Parameter  
https://partner.tiktokshop.com/docv2/page/64f199679495ef0281851ee5  
https://developer-docs.amazon.com/sp-api/docs/connecting-to-the-selling-partner-api#step-3-add-headers-to-the-uri  

## Signature

The v202309 of the API expands signature protection beyond just path and query parameters. Signatures will now also cover request bodies for POST APIs. To generate the signature for the v202309 APIs, developers need to use the new method.

new version: input = input + body

Compared amazon api, hashed_payload is also used to generate signature..

https://partner.tiktokshop.com/docv2/page/64f199709495ef0281851fd0#Back%20To%20Top  
https://docs.aws.amazon.com/IAM/latest/UserGuide/create-signed-request.html#create-canonical-request-hash  

## Content type

The v202309 APIs now only support application/json for non-binary requests. Binary requests should use multipart/form-data to ensure efficiency and standards compliance.
