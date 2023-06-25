<a name="br1"></a> 

Hosted on:

<https://security2-mij-343012313c7d.herokuapp.com/>

*Feature that require access control that prevent IDOR:*

Register with your own credentials, then navigate to the ‘Dogs’ page and create a new dog,

only you as the creator can edit and delete the dog. You also blocked from editing or

deleting dogs that you didn’t create.


From the Dahsboard you can select to become an admin, from there you can access the 

admin-only page. This page can only be accessed as a registered admin user. As a non admin 

registered user, you can not see the admin route nor acces it manually.

To prevent Users from accessing control over dog’s that they didn’t create by changing the id

in the URL e.g. /dogs/2 to /dogs/3, the following code was implemented in the DogController 

for access controlcheck so that only the user who created the dog can edit and delete it. 



\- The hosted application is configured in such a way that it

prevents *snooping* and attacks like *session hijacking*

Same-site set to lax allows the user to stay in the logged in session when arriving from an

external link, while same-sime set to strict does not allow the cookie to be sent on a

cross-site request.

/config/session.php file


Lifetime session has been shortened so that risk of malicious parties gaining access is

reduced

/config/session.php file


Furthermore the application has rate limiting applied to protect against brute force attacks.

/app/providers/RouteServiceProvider.php
