WORKsearch -- README

These notes are subject to change.

=====

November 19, 2013

WORKsearch (a working title) is a personal, independent project which I began in
May 2013 chiefly to stay in practice in between jobs. Currently it is a work in
progress. I might not include every single folder and file in this project,
whether complete or not. It is also a spare-time project, something I work on
whenever I can free some time; it is not beholden to any timetables or
deadlines. 

Being in between jobs, and times being what they have been, I found that
creating a personal website and database with an aim toward managing my contacts
and logging my activity would be an ideal project for me to maintain my
strengths as a coder while working on areas which could use improvement. Being
in between jobs, it is difficult for me to think of anything else as a subject
for such a project. (In happier times, this might have been a project about my
DVD collection or something else fun.)

Originally this project was meant to be a single-user project. Although I have
no ambition that this could be a major application which other people could use,
I soon decided to make it a multi-user project. Were this to become a major
project, I would not object to finding ways to monetize this project -- on
several conditions, including: no unemployed person pays to use it.

Plus, it helps to have a code sample of something somewhere. ;)

However finished or unfinished these files may appear, there is definitely a
method (or function) to my madness. Whatever might appear to be "broken", I am
likely to repair in due time when my other priorities permit.

Should you feel compelled to advise, may your criticism please be constructive.
I reserve the right to ignore any other kinds of criticism. ;)

=====

WHAT'S IN IT

Longstoryshort: So far, PHP 5.4.7 over XAMPP 1.8.1 connecting to MySQL 5.5.27
via PDO using HTML, HTML5, CSS and CSS3; to a lesser extent, JavaScript and
jQuery as well. My IDE is NetBeans 7.3.

For now, I am concentrating on back-end programming. Other technologies,
particularly on the front end, shall follow as I go along.

Beyond framing the pages, color schemes and other aesthetic issues are the least
of my concerns for now. I might want to keep the project flexible by allowing it
to be reskinned by others anyhow.

The long story -- by the folders:

INCLUDED/REQUIRED FOLDERS/FILES:

- _classes -- The classes which I convert into objects as needed throughout the
project. Object-oriented programming is one of the areas which I seek to
improve for myself. This project is my first opportunity to work with classes in
earnest. All of the classes are entirely mine, except for those related to
PHPMailer. I am particularly proud of the Data class which I created for this
project, which includes methods to generate fundamental SQL C*R*U*D statements
compatible with PDO connections, including parameterized queries. Although I am
not using an MVC framework, some MVC concepts may "leak" into this project. I am
not certain that I can refer to my Data class formally as a "Model", although
this class helps me appreciate the Model concept in general.

- _config -- After using "mysql connect" and "mysqli connect" to connect to
MySQL, sometimes mixed together in a project, I decided that PDO would make me a
more disciplined PHP developer as well as enhance my understanding of
object-oriented concepts. Much of the PDO configuration can be found here, along
with session code and miscellaneous page configurations I may apply to most of
the web pages.

- _css -- Styling files, along with a font I call in for the body of each page.
Some CSS3 code is included.

- _functions -- reusable functions I may call as needed throughout the project.

- _include -- additional included / required fields. Ultimately any file or
folder in this project prefixed by an underscore is "included / required" by
other files. I simply like to give some semantic meaning to certain groups of
such files, depending on how I intend to to use them.

- _views -- The "V" in MVC, these are basic reusable HTML template files applied
throughout the project. Again, although this is not formally an MVC project,
"View" is another of the MVC concepts which rubbed off a bit here. (One of the
files is actually a "baby step" into jQuery Mobile; among other things, I hope
to create a mobile version of this project. Until I approach jQuery Mobile in
earnest, I am keeping all my other jQuery Mobile files off GitHub.)

MAIN FOLDERS/FILES:

- companies -- A CRUD pattern of pages wherein users create, read, update and
delete prospective companies.

- contacts -- A CRUD pattern of pages wherein users create, read, update and
delete the individual contacts for these companies.

- logs -- Inspired by the IDES "work search" forms (which gives this project its
working title), this is where users log their activities with their contacts.
You might notice a "_validation" file in each of the companies / contacts / logs
/ profile folders. This is where I work on the back-end validation for the
create and update forms. I used this structure elsewhere. As IDES and other
state unemployment benefit departments seem to require a lot of fields, I am
likely to work on the log validation first.

- profile -- The creation and updating of a User's Profile. For now, I want only
one Profile per User.

ROOT FILES -- among others:

- index: usually the main, true home page of a project, I might use it as a
"traffic" page, depending on the existence of a login or profile.
- register: where the user enters a username, password (which the system shall
encrypt) and email address.
- welcome: ultimately the real home page
- login: the login form. Depending on whether I can work out e-mailing issues
in my environment, this form may include "forget login" logic.
- logout: shuts down the session and redirect to login.

IMMEDIATE ISSUES as of 2013.11.19:

- A general doublecheck of the back-end re Profile, Company, Contact and Log.
- A specific doublecheck of back-end and front-end validation for Profile,
Company, Contact and Log forms.
- Front-end JavaScript (jQuery?) "are you sure?" logic re Delete.
- Look into pagination of main tables; recheck sorting and filtering where
applicable.
- Explore object encapsulation further -- i.e. whether or not to make certain
properties and methods private or protected, especially in my Data class.
- Company detail: add lists of related logs and contacts; cross-reference.
- Contact detail: add list of related logs and additional contacts within
a contact's company; cross-reference.
- Log detail: to be determined.
- Whether to have an "initiated by [me or contact]" field in either Contacts or
Logs or both.
- Company: no companies = redirect from index to create.
- Contact: no contacts = redirect from index to create.
- Log: no logs = redirect from index to create.
- Profile: no profile = redirect from index to create.

LONG-TERM NICE-TO-HAVES as of 2013.11.19:

- E-mail logic using PHPMailer which sends custom or form e-mails, perhaps with
resume attachments, to contacts while logging said activity into Logs.
Limitations within my environment (Windows 7 notebook, XAMPP) might prevent
this.
- A jQuery Mobile version of the entire project. As in object-oriented
programming, this project may be my first earnest opportunity to learn jQuery
Mobile as well as my first earnest attempt to combine PHP with jQuery Mobile.
(Not interested re Android or iOS at the moment.)

OTHER:

- I created the supporting MySQL database myself. I might -- or might not --
post the SQL statements behind the tables here in lieu of the actual database
itself. It may depend on "popular demand".