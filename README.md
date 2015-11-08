WORKsearch -- README

These notes are subject to change.

=====

April 7, 2014

WORKsearch (a working title) is a personal, independent project which I began in
May 2013 chiefly to stay in practice in between jobs. Currently it is a work in
progress. I might not include every single folder and file in this project,
whether complete or not.

It is also a spare-time project, something I work on whenever I can free some
time. It is not beholden to any timetables or deadlines. Ideally it may include
coding principles and practices which I could apply rapidly to other projects. 

Being in between jobs, and times being what they have been (for me at least), I
found that creating a personal website and database with an aim toward managing
my contacts and logging my activity would be an ideal project for me to maintain
my strengths as a coder while working on areas which could use improvement.
Being in between jobs, it is difficult for me to think of anything else as a
subject for such a project. (In happier times, this might have been a project
about my DVD collection or something else fun. Having recently sold the majority
of my DVD collection, perhaps it is just as well.)

Originally this project was meant to be a single-user project. Although I
currently have no ambition that this could be a major application which other
people could use, I soon decided to make it a multi-user project. Were this to
become a major project, I would not object to finding ways to monetize this
project -- on several conditions, including: *no unemployed person pays to use
it*.

Plus, it helps to have a code sample of something somewhere. This project is
also a showcase of the current state of my coding skills.

However finished or unfinished these files may appear, there is definitely a
method (or function) to my madness. Whatever might appear to be "broken", I am
likely to repair in due time when my other priorities permit.

Should you feel compelled to advise, may your criticism please be constructive.
I reserve the right to ignore any other kinds of criticism. ;)

=====

WHAT'S IN IT

*Longstoryshort*: So far, PHP 5.4.7 over XAMPP 1.8.1 connecting to MySQL 5.5.27
via PDO using HTML, HTML5, CSS and CSS3; to a lesser extent, JavaScript and
jQuery as well.

My IDE is NetBeans. Last week I updated from 7.3 to 8.0.

For now, I am concentrating on back-end programming. Other technologies,
particularly on the front end, shall follow as I go along.

Although at times I may borrow some MVC concepts, this is not an MVC-based
project. Until I get more deeply into Model-View-Controller and other such
frameworks, I am structuring this project so that, were I to handle it to an
expert in MVC, said expert might easily know what pieces to convert to MVC.

When I first learned PHP, I would connect to MySQL using either mysql_connect or
mysqli_connect or (rather irresponsibly) both. Using PDO instead has made me a
far more disciplined PHP developer, especially since PHP Data Objects as its
name suggests utilizes object-oriented programming concepts which I am keen to
learn anyhow.

Beyond framing the pages, color schemes and other aesthetic issues are the least
of my concerns for now. I might want to keep the project flexible by allowing it
to be reskinned by others anyhow. So, yes, even if it functions perfectly, it
may still appear ugly for a long while.

*The long story* -- by the folders:

INCLUDED/REQUIRED FOLDERS/FILES (each prefaced with "_"):

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

- prospects -- A CRUD pattern of pages wherein users create, read, update and
delete prospective companies.

- contacts -- A CRUD pattern of pages wherein users create, read, update and
delete the individual contacts for these prospects.

- logs -- Inspired by the IDES "work search" forms (which gives this project its
working title), this CRUD pattern of pages is where users log their activities
with their contacts. You might notice a "_validation" file in each of the
prospects / contacts / logs / profile folders. This is where I work on the
back-end validation for the create and update forms. I used this structure
elsewhere. As IDES and other state unemployment benefit departments seem to
require a lot of fields, I am likely to work on the log validation first.

- profile -- The creation and updating of a User's Profile. For now, I want only
one Profile per User.

- documents -- A provision for the user to upload resumes and other documents,
liked to be used as attachments or templates for e-mails.

- mail -- Yet to be built. A provision for the user to send e-mails. Part of the
intent is to automatically log the sending of e-mails into the Logs section.

- networking -- Yet to be built. A provision to create a diary of networking
activity at job fairs and other similar events.

ROOT FILES -- among others:

- index: usually the main, true home page of a project, I might use it as a
"traffic" page, depending on the existence of a login or profile.
- register: where the user enters a username, password (which the system shall
encrypt) and email address.
- welcome: ultimately the real home page
- login: the login form. Depending on whether I can work out e-mailing issues
in my environment, this form may include "forget login" logic.
- logout: shuts down the session and redirects to login.

OTHER:

- I created the supporting MySQL database myself. I might -- or might not --
post the SQL statements behind the tables here in lieu of the actual database
itself. If I can figure out how, I might consider posting whatever triggers or
stored procedures I may have written. It may depend on "popular demand".
- As I suggested earlier, you might not see every file of this project on
GitHub. For example, I am sparing GitHub my image files.

UPDATE 2014.03.27:
- I last updated my WorkSearch projects on GitHub on/about 2014.01.22. Since
then, my attention was dominated by issues concerning my job search as well as
other personal matters. One of the job search issues concerned a perception that
recruiters were calling me far more often for ASP.NET work than for PHP work.
So, among other things, I spent much of my time on MVC Entity Framework
tutorials in a bid to revive my dormant ASP.NET skills.
- Up to now, my WorkSearch projects were built using NetBeans 7.3. These were
the first projects wherein I would connect to GitHub via NetBeans. Yesterday I
downloaded and installed NetBeans 8.0. The 2014.03.27 posting of this updated
README.md file is a test to ensure that my GitHub settings are still intact.

UPDATE 2014.04.17
- On April 12, 2014, I was notified of the existence of a website
[http://www.jibberjobberusa.com/login.php] which worked along lines so similar
to this project that I am tempted to abandon this project completely except as a
coding exercise. I was always ambivalent about whether or not my project could
become an app which others could use, as the priorities beyond that were about
staying in practice between jobs and having code samples to show people. I am
definitely not interested in creating a competing product anyhow.

UPDATE 2015.11.08
- Many of the back-end changes during the past few weeks reflect an upgrade of
my notebook computer's XAMPP to accommodate PHP 5.6 and MySQL 5.6 as well as the
odd new form field here and there.
- Very soon I will be changing the front-end look and feel of this project,
replacing my original design with what I hope would be a template incorporating
responsive web design concepts. This personally strikes me to be a far more
intricate undertaking than my recent back-end work; thus there might not be
significant updates to GitHub for a long while. I already did some initial
tests applying a template to my form pages, for my priorities in seeking
responsive templates were form-related. Recently I worked through a rather
detailed tutorial on RWD -- did so twice, in fact -- which for some reason left
out forms, hence the template search. I am starting with a template from
Tutorialzine
[http://tutorialzine.com/2015/07/freebie-7-clean-and-responsive-forms/],
although this could still change. Regardless It will still be a rather simple
and bland design, for this project is essentially a simple and bland form/CRUD
project. Maybe in due time I might make changes to the template to make this
design more my own.