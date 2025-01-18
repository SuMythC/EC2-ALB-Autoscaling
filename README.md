# Scalable Web Application Architecture on AWS

This project demonstrates how to build a highly scalable web application environment. The architecture utilizes various AWS services such as Application Load Balancer (ALB), EC2 instances, RDS for database management, Route 53 for DNS, and optional integration with AWS Certificate Manager (ACM) for SSL certificates.

![Architecture Diagram](https://github.com/user-attachments/assets/244b87ae-99ea-4d46-9589-823783bc13d9)

## Components of the Architecture

### 1. Auto Scaling Group
An Auto Scaling Group (ASG) is created with a minimum of 2 EC2 instances to ensure high availability and scale-out capabilities during traffic spikes.

- **Minimum Instances**: 2
- **Integration with SNS**: Notifications will be sent if an instance goes down or if scaling actions occur.

![Auto Scaling Group](https://github.com/user-attachments/assets/8620ef34-6fe7-4667-9658-020dd57274db)

### 2. EC2 Instances
The ASG will automatically spin up 2 EC2 instances that run the web application, ensuring redundancy and load distribution.

![2 EC2 Instances](https://github.com/user-attachments/assets/21bb293c-c74b-44f5-b23e-d3d03da54623)

### 3. SNS Integration
Amazon Simple Notification Service (SNS) is integrated with the ASG to send notifications when instances are launched, terminated, or if an instance fails.

![SNS Configuration](https://github.com/user-attachments/assets/3afe1445-3c92-4213-8f9e-797f83792e82)
![SNS Topic](https://github.com/user-attachments/assets/2a7252af-51e2-4fa4-ac56-af85ac0077b1)

#### SNS Confirmation Emails
When an SNS topic is created, confirmation emails are sent to subscribers.
![SNS Confirmation Email 2](https://github.com/user-attachments/assets/22efdf1f-ca34-4bfa-8bb7-22cf3c8dca78)
![SNS Confirmation Email 1](https://github.com/user-attachments/assets/0fa89eb0-bfb2-45e6-8090-738c1b845142)

### 4. Application Load Balancer (ALB)
An ALB distributes incoming application traffic across multiple targets, such as EC2 instances, ensuring high availability and fault tolerance.

![Application Load Balancer](https://github.com/user-attachments/assets/65fb4354-f1e6-4313-a382-a6716a65c853)

### 5. Amazon RDS
Amazon Relational Database Service (RDS) is used to set up a managed relational database to support the web application.

![Amazon RDS](https://github.com/user-attachments/assets/e76de542-ccd2-4545-8ff3-5b19642a8f75)

# [Testing]
## Registering a User

- The home page contains a form with a name and password field.
- When the form is submitted, a new record is created in the database.

**New Record Created in Database**
![register](https://github.com/user-attachments/assets/542ff914-fc63-4f9a-8f27-c6854076b67e)

**Database Record Retrieved Successfully**
![retrieve](https://github.com/user-attachments/assets/5349869e-37bd-4983-b3eb-517e4e309b9d)

**Visual Confirmation of Stored Data using MySQL Workbench**
![bench](https://github.com/user-attachments/assets/0a1d5255-0cd6-44c3-b57f-8a78fec96c09)

## Testing Distribution of Traffic using ALB

- To verify that traffic is distributed correctly between instances, a PHP script creates a cookie when the user visits the website.
- This cookie is unique for each instance and can be observed in the browser's developer tools.

**Cookie Created on First EC2 Instance**
![cookie](https://github.com/user-attachments/assets/70f9bb55-0c15-47b0-96d7-fc182ebca693)

**Cookie Created on Second EC2 Instance**
![cookie2](https://github.com/user-attachments/assets/a54c99ca-0c36-440b-9cce-0e0a55cdc9b2)

## Testing Auto Scaling Group and SNS Integration

- To test the auto scaling group and SNS integration, one of the EC2 instances was intentionally terminated.
- The corresponding target group was marked as unhealthy, triggering a notification from SNS.

**Intentionally Terminating One EC2**
![sns test](https://github.com/user-attachments/assets/35eed5b9-e190-4e69-9e0c-afb793a8d2c0)

**Target Group Marked as Unhealthy**
![unhealthy](https://github.com/user-attachments/assets/6081458c-cf0a-475a-a603-80df61d94463)

**SNS Notification Sent for EC2 Termination**
![sns notification](https://github.com/user-attachments/assets/e694ad12-be13-43e1-b303-218a4f54466b)

**SNS Notification Sent for New EC2 Instance Spun Up in Response to Failure**
![sns notification2](https://github.com/user-attachments/assets/0060e181-0501-4a97-a17a-8807f5e508d0)

**New EC2 Instance Spun Up in Response to Failure**
![asg spins up another](https://github.com/user-attachments/assets/b02ab5ce-a005-4a66-9770-5f40e579d2ff)

# Integrating Route 53

In this section, we will explore how Amazon Route 53 functions, even though a domain name is not presently available.

## Creating a Hosted Zone

- A hosted zone is necessary for managing the DNS settings for your domain.
- The hosted zone serves as a container for records, enabling you to route traffic and manage settings for your application.

![Hosted Zone Created](https://github.com/user-attachments/assets/c77d9160-8af1-4ff0-9c33-d9c53a1564aa)

## Creating an Alias for the Application Load Balancer (ALB)

- An alias record is created in Route 53 to route traffic to the ALB. This allows you to direct DNS requests to the appropriate resources without needing an IP address.
  
![Alias Record Creation for ALB](https://github.com/user-attachments/assets/a83ca4ff-9e19-428f-b64e-3c27fdab0e5e)

