The contents of the "_sql" directory are *.sql files used in the creation of
tables for the MySQL database which supports this project.

Whereas this is simply a "demo" project:
- I am not overly concerned with security issues.
- As this project progresses, I might use these files to erase data at will and
restart from scratch. 

As a rule I generally would not have such a directory in a web project. However,
I created it for two general reasons:

POPULAR DEMAND
- People were curious about the data supporting this project. I was not entirely
sure how to display MySQL data on GitHub. Nor did I feel entirely comfortable
doing so.  
- I wanted to demonstrate my basic knowledge of SQL statements beyond those
I use in the server-side code

RESTORATION
- In the event that I needed to recreate the database, this is where I store the
files which I may use to restore the tables -- not only the foundations (field
names, formatting and so on) but, in the case of lookup tables, some actual
data in order to save time.

=====

WARNING:

As I write this (2015.10.11) I have yet to update the rest of this project's
files to reflect these SQL files (especially the "_classes" files, which are
the most related to the SQL files). In the course of creating these SQL files,
fields were either added, reformatted or removed. So if anyone attempts to
recreate this project for themselves, things may "break" for a while.