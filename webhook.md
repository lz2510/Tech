# Webhook

## Continuous polling vs. webhook subscriptions

![image](https://github.com/lz2510/TechInterview/assets/1209204/fd03118e-c40e-427e-a0d9-d3c187192451)

https://shopify.dev/docs/apps/webhooks

## Pattern for Webhook Processing

In other words, any processing performed on a webhook invocation must be as simple as possible, with the goal of reducing the risk of errors. Along these lines, it is preferable to divorce the logic of receiving the request and storing it safely from the business logic of processing the request.

In order to keep processing as simple as possible, the following pattern has served me well in the past:

1. Endpoint authenticates the request and offloads the payload into a staging system. No synchronous business logic is performed.
2. 2xx response code is returned. If the request cannot be authenticated or there is an error getting the payload into a staging system, an error is returned.
3. The staging system identified in the second step could be a variety of things:

- A queuing systems (such as AWS Simple Queue Service)
- A streaming system (such as AWS Kinesis)
- A data store (such as AWS DynamoDB)

![image](https://github.com/lz2510/TechInterview/assets/1209204/25654806-f6f2-408b-8377-1b1d46a363e1)

https://medium.com/@andy.tarpley/webhook-processing-with-api-gateway-and-sqs-f8309411913a#:~:text=In%20other%20words%2C%20any%20processing,logic%20of%20processing%20the%20request.

## Pros And Cons Using AWS EventBridge As Webhook Receiver

Use aws sqs to receive web hook which is redirected from eventbridge. Then poll and handle logic based on capacity of your application.

Why use sqs, because sqs is used by polling. The application can handle the logic based on capacity.

Sqs is not one to many. If want to one to many, use event and listener.

The main advantage of using AWS EventBridge (or Google Pub/Sub) over classic "self-managed"/http endpoints is that your app can consume webhooks at it's own pace, so if a bunch of webhooks come in a burst, we can easily deliver them all to EventBridge even if your app consumes webhooks at slower rate than we can deliver them. This has definitely been an issue with some apps that use HTTP in the past.

The downside of using EventBridge is that you need to manage the queue yourself. However, if you're already using the AWS infra, it shouldn't be a problem.

https://community.shopify.com/c/shopify-apis-and-sdks/pros-and-cons-using-aws-eventbridge-as-webhook-receiver/td-p/1189355


