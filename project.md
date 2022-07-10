# Two main projects
1. E-commerce platform  
It’s a sass platform. Our customers put their products in the platform, then user can place order. Our customers are international. For example nanos which is from span, rituals which is from Nethelands, Toysrus which is from USA.
2. Middleware system  
It transforms data between e-commerce platform and oms and wms.
	- Get order from e-commerce platform then send to oms
	- Receive product data from wms and upload to platform
	- Receive inventory feed from wms and update to platform after allocation
	- Do report platform

# Architecture
1. Microservices architecture.
1. Use AWS
1. Docker
1. MessageQueue. Use Kafka decouple some services.
1. Load balancer. Use Nginx.
1. Service Discovery. Use consul.
1. Cache. Use Redis.
1. Authentication and Authorization. Use OAuth2.0.
1. Use Elastic Search as search engine. set a cron job to sync data to ES, including insert, update and delete. 
1. use S3 to store image 
1. MongoDB, store interface log.
1. kubernetes manage container docker and scale up application. It’s maintained by operation team.
1. gitlab CI, deploy to production after merging to master branch.

# Big challenge in project

### Updating inventory to platform takes a few hours. 

We change to use Kafka. Serval instances with same group id to consumer the inventory to update to platform.It enhance the performance to with 1 hour.
