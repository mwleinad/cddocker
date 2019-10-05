- need to install docker in windows pro (home doesn't work)
- if you installed docker tools delete the env variables from windows (all the DOCKER_ variables)

- cd c:/
- mkdir project
- composer create-project laravel/laravel .       //You have to add the dot
- git init
- git submodule add https://github.com/LaraDock/laradock.git laradock
- cd laradock
- mv env-example .env
- docker-compose up -d nginx mysql phpmyadmin redis workspace 

######################################################

To launch the dev version of the vue project (To make changes) 
Open your WLS. Go to your project folder mine is
cd /c/comprobantedigital
go to frontend
cd frontend

Run 
yarn install
then
yarn serve

This will create a new frontend development server at
http://localhost:8085/

Go to that page.
Make a change to dashboard.vue
It will take some seconds but it should build

I wasn't able to make the HMR (hot module reload) work and the project is to big, so, just refresh the page to see the changes

Basically the frontend is Javascript and HTML 
http://localhost:8085/  #Front end
http://localhost #backend


#####################################

be very careful running `composer update`, as this updates all dependencies
You only need to run `composer install` this will install the latest APPROVED version of the dependencies.

All the php-artisan commands are run from git bash


#####################################

To test the api calls you can go download 
https://insomnia.rest/

######################################

Basic stuff
- The aplication is modular. 
	- Which means is divided in modules. For instance user, company, customer, etc. 
	- This decouples the services and we can focus on the business logic.
	- Each module has its own models, views, controllers, tests, etc.
	- https://nicolaswidart.com/blog/writing-modular-applications-with-laravel-modules
- We use Single Action Controller. 
	- That means, one controller one action. IE. Add a user, 1 controller, delete a user another controller. 
	- For a basic CRUD you'd have 4 controllers.
	- https://medium.com/@jrdnrc/single-action-controllers-a7de27c2c78b
	- The controller should be REAL REAL basic. All data should be already validated, so you just pass data to the service and return a response to the view. Nothing more. NO BUSINESS LOGIC
- We use correct http verbs.
	- GET, POST, DELETE PATCH
	- GET gets 1 or more resource
	- POST creates a resource
	- DELETE deletes a resource
	- PATCH updates a resource
- We use the repository pattern.
	- Even though laravel offers an Eloquent ORM (https://laravel.com/docs/6.x/eloquent) we add another layer with repositories
	- Repositories makes sure that if we ever change anything internally all we have to change is the repository class.
	- They are easier to mock and test 
	- The one I implemented is the same we use at work, so I know it works for 99.9% of the cases, you really shouldn't need anything else.
	- https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/
- We use validation requests
	- Even before hitting the controller we have to validate our input. 
	- IE. Say you need to create a user with an email, we need to validate the email format, we use laravel validation for that.
	- After the validation we proceed to the controller
- We use typehinting and return values for everything
	- https://www.tutorialspoint.com/php7/php7_returntype_declarations.htm
- We use phpdocs for everything
	- Do not forget to generate the phpdoc blocks
- We do not expose ids, we use uuids instead
- We use softdeletes
	- Softdelete means that the row is never deleted from the db, a deleted_at column is used instead. Laravel handles this
	- https://laravel.com/docs/5.7/eloquent#soft-deleting
- We use Dependency Injection.
	- Laravel uses a service container that allow us to typehint and inject almost any class. 
	- https://laravel.com/docs/5.8/container
	- If a class is using more than 4 dependencies that's a sign that a class is doing to much, and we probably need to refactor into smaller classes
- We refactor, like a lot
	- code smells like, too many parameters in a function, classes breaking the Single Responsibility Principle. or not being SOLID
	- Too many if, using switch, all that have to be refactored.
	- We will do code reviews for that
- We use RESTful routes
- Not used yet
	- Middleware. The middleware is something you want to add even before the controller or validation request is hit. 
		- They are useful if you need to redirect the user if they aren't authorized for an action. 
		- IE let's say you have a user trying to access an admin page, you can check the user and redirect to the home page instead. That way you don't even have to hit the validation request or controller.
	- Factory pattern. They are very helpful when you have related types with the same flow.
	- IE, an invoice has different "types". Factura, Nota de credito, Nomina, etc. They all return an XML
	- You can use the factory pattern and just pass the type and have different classes that handle the process in the same way. If you add another type you just create another class that uses all the common methods and just change what's specific for that one.
	- Policies. Policies are a simple laravel mechanism to know if we have permission to execute something.
		- IE. InvoicePolicy, we can add a view/edit policy to know if the user can either view or edit the invoice.
	- Mappers
		- Mappers are object builders, instead of building an array and returning an array, we build an object, that way we can reuse that object anywhere


The layers are basically
	- Route
	- Middleware
	- Validation request
	- Controller
	- Service or Factory
