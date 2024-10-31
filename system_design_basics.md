# System Design Basics

## Load Balancing

To utilize full scalability and redundancy, we can try to balance the load at each layer of the system. We can add LBs at three places:
* Between the user and the web server
* Between web servers and an internal platform layer, like application servers or cache servers
* Between internal platform layer and database.

![image](https://github.com/lz2510/Tech/assets/1209204/faa22719-e6c1-4581-8ddc-a5c31b59af09)

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b7aac93e7ae59a1b0ad

## API Gateway

Difference between an API gateway and a load balancer

An API gateway is focused on routingrequests to the appropriate microservice, while a load balancer is focused on distributing requests evenly across a group of backend servers.

![image](https://github.com/lz2510/Tech/assets/1209204/b63bd7a5-82d7-4964-b72e-0aff0bbd67b9)

Another difference between the two is the type of requests that they typically handle. An API gateway is typically used to handle requests for APIs, which are web-based interfaces that allow applications to interact with each other over the internet. These requests typically have a specific URL that identifies the API that the client is trying to access, and the API gateway routes the request to the appropriate microservice based on this URL. A load balancer, on the other hand, is typically used to handle requests that are sent to a single, well-known IP address, and then routes them to one of many possible backend servers based on factors such as server performance and availability.

https://www.designgurus.io/course-play/grokking-system-design-fundamentals/doc/introduction-to-api-gateway

## Load Balancer vs. API Gateway

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/65b2df61d7a044ad8209f529

## Proxies

A proxy is a piece of software or hardware that sits between a client and a server to facilitate traffic. A forward proxy hides the identity of the client, whereas a reverse proxy conceals the identity of the server. So, when you want to protect your clients on your internal network, you should put them behind a forward proxy; on the other hand, when you want to protect your servers, you should put them behind a reverse proxy.

<img width="870" alt="Screenshot 2024-06-26 at 21 45 29" src="https://github.com/lz2510/Tech/assets/1209204/aa80574c-f64e-4357-a634-a0bae7bb2d71">

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b7cac93e7ae59a1b0cd

## http long polling vs websockets

https://www.designgurus.io/course-play/grokking-the-system-design-interview/doc/638c0b83ac93e7ae59a1b111


