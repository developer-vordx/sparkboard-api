# 📦 Vordx Technologies Laravel Backend Boilerplate


> Official Laravel backend template by Vordx Technologies for building robust, scalable, and secure RESTful APIs with 
> built-in support for service contracts, versioning, authentication, and clean architecture principles.


---

## 🚀 Tech Stack

-   **Framework:** Laravel 10+

-   **Language:** PHP 8.1+

-   **Architecture:** RESTful API

-   **Testing:** PHPUnit, Laravel Test Factory

-   **Authentication:** JWT (JSON Web Tokens)

-   **Database:** MySQL / PostgreSQL (configurable)

-   **Queue System:** Laravel Queues (Redis, SQS, or Database)

-   **API Documentation:** OpenAPI + Postman

-   **Service Providers:** Custom Dependency Injection

---



## 📁 Project Structure

    app/
    ├── Http/
    │   ├── Controllers/
    │   │   ├── Api/
    │   │   │   │   │──V1/
    │   │   │   │   │   ├── Auth/
    │   │   │   │   │   ├── AuthController.php
    │   │   │   │   │   ├── EmailVerificationController.php
    │   │   │   │   │   ├── PhoneVerificationController.php
    │   ├── Requests/
    │   │   ├── Api/
    │   │   │   │   V1/
    │   │   │   │   ├── Auth/
    │   │   │   │   │   │   ├── LoginRequest.php
    │   │   │   │   │   │   ├── SignUpRequest.php
    │   │   │   │   │   │   └── ForgotPasswordRequest.php
    |
    │── Contracts/
    │   │   ├──V1/
    │   │   │   ├── InitiateOnboardingInterface.php
    │   │   │   ├── VerifyMailInterface.php
    │   │   │   ├── PhoneVerificationInterface.php
    │   │   │   └── ...
    ├── Services/
    │   ├── Api/
    │   │   │   ├──V1/
    │   │   │   ├── Auth/
    │   │   │   │   ├── Onboarding/
    │   │   │   │   │   ├── InitiateOnboardingService.php
    │   │   │   │   │   ├── VerifyMailService.php
    │   │   │   │   │   └── ...
    │ 
    |
    ├── Providers/
    │   ├── AppServiceProvider.php
    │   ├── OnboardingServiceProvider.php  # Handles interface-service bindings
    |
    routes/
    ├── api.php
    │   ├── Route::prefix('v1')->group(...)
    |   
    tests/
    ├── Feature/
    │   ├── Onboarding/
    │   │   ├── SignupTest.php
    │   │   ├── LoginTest.php
    │   │   └── 



---

## 🛠️ Installation & Setup

```bash
# Clone the repository
git clone https://github.com/vordxtechnologies/backend-sample.git
cd backend-sample

# Install dependencies
composer install

# Copy .env and configure
cp .env.example .env
php artisan key:generate

# Setup DB
php artisan migrate 

for testing data
# (Optional) Seed data
php artisan db:seed

# Run tests
php artisan test

# Start local server
php artisan serve

# start queue job and sending the mail and configure the webhooks
php artisan queue:work
````

### 🧩 Core Architectural Principles

**✅ Clean Separation of Concerns:**
-   Business logic is extracted into Service classes, organized by version (e.g., App\Services\Api\V1\ExampleService).

- All services implement an automatically generated contract interface and are bound via Laravel’s container in a custom AppServiceProvider or dedicated ServiceProvider.
- Controllers only handle HTTP request/response logic.

-   Business logic lives in Service classes.

-   Contracts define expected service behaviors.

-   Each layer is testable and independently swappable.

**🛠️ Custom Artisan Commands:**
```` bash
    php artisan make:service Api/V1/Payment
````
🧰 Create a New Service

**✅ What it does:**

-   Creates a YourServiceNameInterface.php inside App\Contracts\Api\V1\

-   Creates the concrete YourServiceName.php inside App\Services\Api\V1\

-   Automatically binds the interface to the service in your App\Providers\ServiceBindingProvider.php (or designated provider)
---


📁 Example File Structure:

    app/
    ├── Contracts/
    │   └── Api/
    │       └── V1/
    │           └── PaymentInterface.php
    ├── Services/
    │   └── Api/
    │       └── V1/
    │           └── PaymentService.php

### ⚙️ Example Usage:
In your controller:

> use App\Contracts\Api\V1\PaymentServiceInterface;
>
> 
> 
> public function __construct(protected PaymentServiceInterface $paymentService) { }


### 🛡️ Auth Flow with JWT

-   Login/Register → returns access_token + token_type + expires_in.

-   Client must include Authorization: Bearer {token} in headers.

-   refresh endpoint issues a new token without logging in again.

-   logout invalidates current token.
---

### 🧪 Testing

```bash
        php artisan test 
````
Test coverage includes:

-   Auth (Login/Register)

-   Token refresh/logout

-   User resource access

**Supports:**
-   Laravel factories and seeders
-   Database transaction rollbacks for test isolation
---

**📘 API Endpoints:**
- 
| Method | Endpoint           | Description       | Auth Required |
| ------ | ------------------ | ----------------- | ------------- |
| POST   | `/api/v1/login`    | Login via email   | No            |
| POST   | `/api/v1/register` | Create a new user | No            |
| POST   | `/api/v1/logout`   | Invalidate token  | Yes           |
| POST   | `/api/v1/refresh`  | Refresh token     | Yes           |
| GET    | `/api/v1/user`     | Get current user  | Yes           |



### 📘 API Docs
Handles biometric, behavioral, or AI-powered identity matching.

-    OpenAPI: docs/openapi.yaml

-   Postman Collection: docs/postman_collection.json

-   Use Swagger UI or Redoc to visualize the OpenAPI docs.
---

### ✅ Usage Steps for New Projects

**Boilerplate:**
-   Clone this boilerplate.

-   Rename namespaces (App if needed).

-   Remove .git, initialize your own.

-   Run composer install, php artisan migrate, and php artisan jwt:secret.

-   Build your modules under Http\Controllers\Api\V1\.

---



### 📦 Deployment Notes

-   Ensure .env is correctly configured (DB, JWT, Mail)

-   Use php artisan config:cache and route:cache

-   Use a queue driver (e.g., Redis or SQS) for production

-   Secure APP_KEY, JWT_SECRET, and MAIL credentials

-   Run command 
```bash
      php artisan optimize 
```
---

###  🤝 Contributing

-   Use consistent naming and PSR-12 formatting.

-   Cover all new features with proper tests.

-   Follow Vordx commit message format.

-   Submit PRs with updated API docs (OpenAPI/Postman).
---

### 📌 Why Use This Boilerplate?
-   ✅ Accelerated Development
-   ✅ Scalable Service Structure
-   ✅ Secure Auth System
-   ✅ Clean, Maintainable Code
-   ✅ Ready for Microservices / Domain-Driven Design
-   ✅ Built-in Testing & Docs

> 🏗️ Built with care by [Vordx Technologies](https://vordx.com) – building secure systems.

