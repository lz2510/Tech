# amazon sp-api

## app information

amazon: client id, client secret  
tiktok: app key, app secret  
They are used to obtain access token.  

https://developer-docs.amazon.com/sp-api/docs/viewing-your-application-information-and-credentials  
https://partner.tiktokshop.com/docv2/page/64f1994264ed2e0295f3d631  

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

## Does the Referesh Token ever expire

Refresh token is used to get new access token after old access token has expired. The refresh token keeps the same in new access token response. So if the refresh token will expire?

In sp-api doc as below:

    An LWA refresh token is a long-lived token that you use to generate an LWA access token.

In Login with amazon doc as below:

    Refresh tokens are valid indefinitely, unless the user has removed the website or mobile app from the list of allowed apps for their account. 

But in SP_API General FAQs,

    When will the refresh token expire?
    
    Public developers select to expand the answer.
        The refresh token expires after one year.
    
    Private developers select to expand the answer.
        The refresh token does not expire.

    Can we get the expiration date of refresh tokens through SP-APIs?
        No. However, sellers will receive an email with a reminder to re-authorize their SP-API app 30 days before the expiration.

The conclusion:

The refresh token expires after one year. And sellers will receive an email with a reminder to re-authorize their SP-API app 30 days before the expiration.

https://github.com/amzn/selling-partner-api-docs/issues/591
https://developer-docs.amazon.com/sp-api/lang-en_US/docs/sp-api-general-faqs#when-will-the-refresh-token-expire
https://developer-docs.amazon.com/sp-api/lang-en_US/docs/website-authorization-workflow#renew-your-authorization
https://developer.amazon.com/docs/login-with-amazon/refresh-token.html

## Refresh token keeps the same when getting new access token

request: 

    {
      "client_id": "amzn1.application-oa2-client.i1ks4gkr7nklw09bw2skkm08fwu0i888o",
      "client_secret": "amzn1.oa2-cs.v1.qrby3jye5o55sggbamlek9byfo50lvnsiuj9v5amjsllxgo5rv",
      "grant_type": "refresh_token",
      "refresh_token": "Atzr|IwEBICUeGvw3BmlCMFzxi4kn4ogbL597vmzP7hDoo9CbUvxo0eb0vSWm7GkHKbxUV5jXqM9zmmOI_5FHGranaPUrWgf4MotyzWddxWdqDscfLXayWEaW96-84efYDentb031LIXvX6Pe3KGThGbGCX3MuUbYCPwUMI86nfAdvTg9ObDAWPheXR-Xos9ozefK4sIuIUBLKsVTettEetaD0CIwR4dBctYOC4g-98UdtRfIAyftI2hHQHACPE4OR_BLAJObF3AhFd4XQ-ESQnnODBvJnT_J852OKaTVYdpE3Wd3RZqTLpw5FGPo1oHviQHJ0CqSMp4"
    }

response:

    {
      "access_token": "Atza|IwEBIMPSWiEPD5FLvo1UbSFhlzXtEnY7jkG9nKGeBCAAVz1mcxB4tg24h_Mob9kccmYVKdvOqZUzJrGQmZSWnncqS2aFweLEpHIavTA6WK-xUolyUz17Xp4QvbmbnburI84ntbmHBp0kDjo0UYhnG7jJ4vfROVb0T4PSncS5vMMS7ssFQ5TF64xeP6y_hgHPU4wWWrSsU6w_30dIA9A3WOT8tTskLqEnuOK5rzQLGrjcPleMuZcXm1j1zYZ18ngBj3Ld_kUYEshc8q5DXRllq9i7ZQ4L5sLy6bce_wyMKQNJkTp5IL5b57gf0bJcKERtzp-pEQGB06osRtfZXdWYqkuWXNa72cVERCt8ab_1mB1WFCt3zA",
      "refresh_token": "Atzr|IwEBICUeGvw3BmlCMFzxi4kn4ogbL597vmzP7hDoo9CbUvxo0eb0vSWm7GkHKbxUV5jXqM9zmmOI_5FHGranaPUrWgf4MotyzWddxWdqDscfLXayWEaW96-84efYDentb031LIXvX6Pe3KGThGbGCX3MuUbYCPwUMI86nfAdvTg9ObDAWPheXR-Xos9ozefK4sIuIUBLKsVTettEetaD0CIwR4dBctYOC4g-98UdtRfIAyftI2hHQHACPE4OR_BLAJObF3AhFd4XQ-ESQnnODBvJnT_J852OKaTVYdpE3Wd3RZqTLpw5FGPo1oHviQHJ0CqSMp4",
      "token_type": "bearer",
      "expires_in": 3600
    }

    {
      "access_token": "Atza|IwEBICcgWRqXQKUKHzHPXHP1uLNhVFq_zo0kxP4bC_40_nYgeybld55kOwVNMJgfo9eqmVmFrRpLP1Mn6FhV2sLvKs7uY3v_0yfs-XiWn_3GD2pcfIBsGlUWkUmgGkTW2TNTEfeQE_hxjI6V08QOL7-6epZ4rHF54TY69ZuCt8schLDuQ7fNywy3KknSeLZcXj6uyrd1npAJvEdhZ_ABW7BvcznhiZNVRdcQ8Vamqr5BRqgJWslJ8srlidFkMqHtdN-12x8wgnumstG0QQsGgru2VXEaXQYk_HFQ7Ds6SkQk1VJZQayBiDpIYIOEDGliKzN7yVkvapWaXk1nXr2-5XFReDQZuBaH1dmyaafoNMUAYbPtCQ",
      "refresh_token": "Atzr|IwEBICUeGvw3BmlCMFzxi4kn4ogbL597vmzP7hDoo9CbUvxo0eb0vSWm7GkHKbxUV5jXqM9zmmOI_5FHGranaPUrWgf4MotyzWddxWdqDscfLXayWEaW96-84efYDentb031LIXvX6Pe3KGThGbGCX3MuUbYCPwUMI86nfAdvTg9ObDAWPheXR-Xos9ozefK4sIuIUBLKsVTettEetaD0CIwR4dBctYOC4g-98UdtRfIAyftI2hHQHACPE4OR_BLAJObF3AhFd4XQ-ESQnnODBvJnT_J852OKaTVYdpE3Wd3RZqTLpw5FGPo1oHviQHJ0CqSMp4",
      "token_type": "bearer",
      "expires_in": 3600
    }

## Access tokens begin with the characters Atza|.

Refresh tokens follow the same format as access tokens, except they begin with the string Atzr|.

    "access_token": "Atza|IwEBICcgWRqXQKUKHzHPXHP1uLNhVFq_zo0kxP4bC_40_nYgeybld55kOwVNMJgfo9eqmVmFrRpLP1Mn6FhV2sLvKs7uY3v_0yfs-XiWn_3GD2pcfIBsGlUWkUmgGkTW2TNTEfeQE_hxjI6V08QOL7-6epZ4rHF54TY69ZuCt8schLDuQ7fNywy3KknSeLZcXj6uyrd1npAJvEdhZ_ABW7BvcznhiZNVRdcQ8Vamqr5BRqgJWslJ8srlidFkMqHtdN-12x8wgnumstG0QQsGgru2VXEaXQYk_HFQ7Ds6SkQk1VJZQayBiDpIYIOEDGliKzN7yVkvapWaXk1nXr2-5XFReDQZuBaH1dmyaafoNMUAYbPtCQ",
    "refresh_token": "Atzr|IwEBICUeGvw3BmlCMFzxi4kn4ogbL597vmzP7hDoo9CbUvxo0eb0vSWm7GkHKbxUV5jXqM9zmmOI_5FHGranaPUrWgf4MotyzWddxWdqDscfLXayWEaW96-84efYDentb031LIXvX6Pe3KGThGbGCX3MuUbYCPwUMI86nfAdvTg9ObDAWPheXR-Xos9ozefK4sIuIUBLKsVTettEetaD0CIwR4dBctYOC4g-98UdtRfIAyftI2hHQHACPE4OR_BLAJObF3AhFd4XQ-ESQnnODBvJnT_J852OKaTVYdpE3Wd3RZqTLpw5FGPo1oHviQHJ0CqSMp4",

https://developer.amazon.com/docs/login-with-amazon/access-token.html
https://developer.amazon.com/docs/login-with-amazon/refresh-token.html

## Access tokens expire in an hour

"expires_in": 3600
