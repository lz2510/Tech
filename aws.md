# AWS

## event bus vs eventbridge

The service name is EventBridge, not Event Bus. Event Bus is only a component of EventBridge.

An event bus is a router that receives [events](https://docs.aws.amazon.com/eventbridge/latest/userguide/eb-events.html) and delivers them to zero or more destinations, or *targets*.

Event Bus is just a container. It  only receives events. When delivering, eventbridge evaluates rules and deliver. So Event Bus receive and EventBridge do delivery.

An event source sends an event to an event bus. EventBridge then evaluates the event against each rule defined for that event bus.

![Untitled](https://github.com/lz2510/Tech/assets/1209204/b80cf459-da51-4de3-a24d-cd8414591d23)


[https://docs.aws.amazon.com/eventbridge/latest/userguide/eb-event-bus.html](https://docs.aws.amazon.com/eventbridge/latest/userguide/eb-event-bus.html)
