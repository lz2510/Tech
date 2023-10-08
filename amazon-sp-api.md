# amazon sp-api

## three authorization models

1. Login with Amazon (LWA) access token for all operations expect grantless operation and restricted operations 
2. Login with Amazon (LWA) access token for grantless operations
3. Authorization with the Restricted Data Token

## normal operations

## grantless operations

It still needs to be authorized, but it doesn't need to be authorized by the seller. It means it still uses LWA, but it doesn't need to use refresh token.
A grantless operation is an operation that you can call without explicit authorization from a selling partner.   
This means that when you request a Login with Amazon access token prior to calling a grantless operation, you don't need to provide a refresh token. Instead, you use the scope parameter to provide the scope of the LWA authorization grant.  

https://developer-docs.amazon.com/sp-api/docs/grantless-operations  

## Authorization with the Restricted Data Token

It's used for restricted operations.

Operations that return restricted data (such as Personally Identifiable information, or PII) are considered restricted operations, and require special authorization in the form of a Restricted Data Token (RDT). An RDT provides authorization to get the PII required to perform functions such as shipping, tax invoicing, or tax remittance services.  

https://developer-docs.amazon.com/sp-api/docs/authorization-with-the-restricted-data-token  
https://developer-docs.amazon.com/sp-api/docs/tokens-api-use-case-guide  
https://developer-docs.amazon.com/sp-api/docs/applying-for-pii-roles 
