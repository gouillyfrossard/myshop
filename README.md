Myshop projet Epitech


This project uses most of the concepts that you have learned during the PHP pool (mainly PHP d09 and
SQL 1) and combines both PHP and HTML/CSS.
Projects are less restraining than exercises, don’t hesitate to add functionalities. These functionalities can be
awarded bonus points. Before thinking of bonus points, don’t forget that your project must have the basic
functionalities working!
Your code must be object-oriented, so it is expected from you to use classes.
The database needed for this project is given to you. You can use it as a reference, but you are free to edit
it to best suits your needs.
You must keep a strict coherence of error management, ergonomics, accessibility, and
design on each step of the subject.
Put all your CSS in an extra CSS file. No style attribute in the HTML will be tolerated!
1
Step 1: Sign-up/Sign-in
Create a page named “index.php”. This page should be accessible to anyone on your website.
This page will be the main page of your business site.
Create a page named “admin.php”. This page should become accessible once the user is connected. This
page is the main page of administrator interface.
Therefore, you must implement a registration form in a page named “signup.php” and a connection form
in a page named “signin.php”.
The registration page lets you create a new user in a database. This user must have a username, an email
and a password.
In this part, you have to think about security. What is the best way to store a password?
Do you know bcrypt? In any case, think simple but secure.
The login page must verify the login/mail and the password of the user wanting to log in, and redirect him
to the admin page if his credentials are correct.
If, for any reason, some of the form fields are incorrect, you must redirect the user to the
previous form and display explicit error messages about all the errors found.
Try to think about all the cases where a field in the form may be incorrect: the mail has
the wrong form, it already exists in the database, the password is empty... What else?
Finally, you will implement a logout button in the page “index.php”.
Be sure that a reconnection is impossible after disconnection without a new authentication
on the server. Have all cookies been deleted?
2
Step 2: Administration interface
Once connected, your users will have access to an administration page named “admin.php”, if and only if
they have administrator rights in the database.
This page will have links to the following features:
 Displaying all users.
 Editing a user (with an option to grant them administrator privileges).
 Deleting a user.
 Adding a new product.
 Displaying all products.
 Editing a product.
 Deleting a product.
A product must have the following attributes :
 A name
 A description
 A price
 A picture
Creating a page allowing to see the detail of a product can be a good foundation to the
creation of the editing page of this product.
You must handle the errors on the CRUD’s user and product actions.
Make sure that the navigation within your website is clear and simple. Do functionalities
before design for your admin page.
Check than none of this pages is accessible to a non administrator user. Double check
the whole security of your website.
3
Step 3: The shop
One you finished the administration page you will display all the products on your index page.
Remember that this page is intended for your customers, it is therefore essential that it
is easy to use to the greatest number. Focus on layout and design.
Make sure your code is valid W3C.
Don’t forget about SEO.
Make sure your page is responsive. Does the display work on mobile phone screens ?
Check the loading time of your page and ask yourself how to speed it up. Does it make
sense to display a hundred products at once ?
4
Step 4: Categories
In this step, you will make it possible to create new categories of products in the administration panel.
A category can contain both other categories and products. There should be no limit on category level.
Exemple: a category “furniture” can contains another category “chair” itself containing two categories of
products, wooden hair and plastic chair.
Look out for “one to many” database relationships.
5
Step 5: Search bar
You must implement a search bar that can look for products by category, price, name, and display the results
in a dedicated page.
In addition, your search engine should give the possibility to sort the results (alphabetically, reverse alphabetically,
increasing price, decreasing price, etc...).
6
Bonus
Don’t do any bonuses unless you have successfully implemented all mandatory functionalities.
Bonus Ideas:
 Use of API Facebook/Twitter to sign in.
 History of visited products.
 Possibility to get your password back by mail/secret question if forgotten.
 A “share this item” functionality from the product page (by email, facebook, twitter...).
 Possibility to upload an avatar and to display it once connected.
 Whatever you think is relevant :)
7
