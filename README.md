WORKsearch -- README

These notes are subject to change.

=====

WQRKsearch is a personal project which I created chiefly to stay in practice in
between jobs. I might not include every single folder and file in this project,
whether complete or not.

Being in between jobs, I found that creating a personal website with an aim
toward managing my contacts and logging my activity would be an ideal project
for me to maintain my strengths as a coder while working on areas which could
use improvement. Being in between jobs, it is difficult for me to think of
anything else as a subject for such a project.

Originally this project was meant to be a single-user project. Although I have
no ambition that this could be a major application which other people could use,
I soon decided to make it a multi-user project. Were this to become a major
project, I would not object to finding ways to monetize this project -- on the
condition that no unemployed person pays to use it.

Plus, it helps to have a code sample of something somewhere. ;)

=====

WHAT'S IN IT

Longstoryshort: So far, PHP 5 connecting to MySQL via PDO using HTML5, CSS and
CSS3. For now, I am concentrating on back-end programming. Other technologies,
particularly on the front end, shall follow as I go along.

The long story -- by the folders:

_classes -- Where I store the classes which I convert into objects as needed
throughout the project. Object-oriented programming is one of the areas I seek
to improve. This project is my first opportunity to work with classes in
earnest. All of the classes are entirely mine, except for those related to
PHPMailer. I am particularly proud of the Data class I created for this project,
which includes methods to generate fundamental SQL C*R*U*D statements compatible
with PDO connections. Although I am not using an MVC framework, some MVC
concepts make "leak" into this project. I am not certain that I can refer to my
Data class as a "Model", although this class helps me appreciate the Model
concept.

_config -- After using mysql_connect and mysqli_connect to connect to MySQL,
sometimes together, I decided that PDO would make me a more disciplined PHP
developer as well as enhance my understanding of object-oriented concepts. Much
of the PDO configuration can be found here, along with session code and
miscellaneous page configurations I may apply to most of the web pages.

_css -- Styling files, along with a font I call in for the body of each page.
Some CSS3 code is included.

_functions -- reusable functions I may call as needed throughout the project.

_views -- The "V" in MVC, these are basic reusable HTML template files applied
throughout the project. Again, although this is not formally an MVC project,
this is another of the MVC concepts which rubbed off a bit here. One of the
files is actually a "baby step" into jQuery Mobile; among other things, I hope
to create a mobile version of this project.

companies -- A CRUD pattern of pages wherein users create, read, update and
delete prospective companies.

contacts -- A CRUD pattern of pages wherein users create, read, update and
delete the individual contacts for these companies.

logs -- Inspired by the IDES "work search" forms (which gives this project its
working title), this is where users log their activities with their contacts.
You might notice a "_validation" file in each of the companies / contacts / logs
/ profile folders. This is where I work on the back-end validation for the
create and update forms. I used this structure elsewhere. As IDES and other
state unemployment benefit departments seem to require a lot of fields, I am
likely to work on the log validation first.

profile -- The creation and updating of a user's profile.

root files -- among others:
- index: usually the main page, I might use it as a "traffic" page, depending on
the existence of a login or profile.
- register: where the user enters a username, password (which the system shall
encrypt) and email address.
- welcome: the home page
- login: the login form
- logout: shuts down the session and redirect to login.

Other:
- I alluded to PHPMailer classes, which I hope to use to allow users to send
either custom or form e-mails to contacts with attachments (such as resumes);
e-mail activities would automatically be logged into the system.
- I also alluded to jQuery Mobile, with an aim toward making the application
compatible with mobile phones. As in object-oriented programming, this project
may be my first earnest opportunity to learn jQuery Mobile.