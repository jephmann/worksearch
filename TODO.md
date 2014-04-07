WORKsearch -- TO-DO NOTES

These notes are subject to change.

Originally these notes were found on README.md. Today (2014.04.07) I moved them
here ostensibly to make the README shorter. I may revise and update these notes
as time permits.

=====

April 7, 2014


IMMEDIATE ISSUES as of 2013.12.04:

- A general doublecheck of the back-end re Profile, Prospect, Contact and Log.
- A specific doublecheck of back-end and front-end validation for Profile,
Prospect, Contact and Log forms.
- Front-end JavaScript (jQuery?) "are you sure?" logic re Delete.
- Look into pagination of main tables; recheck sorting and filtering where
applicable.
- Explore object encapsulation further -- i.e. whether or not to make certain
properties and methods private or protected, especially in my Data class.
- Prospect detail: add lists of related logs and contacts; cross-reference.
- Contact detail: add list of related logs and additional contacts within
a contact's prospect; cross-reference.
- Log detail: to be determined.
- Whether to have an "initiated by [me or contact]" field in either Contacts or
Logs or both.
- Prospect: no prospects = redirect from index to create.
- Contact: no contacts = redirect from index to create.
- Log: no logs = redirect from index to create.
- Profile: no profile = redirect from index to create.
- Tabbing through forms with a footer sticking to the bottom.
- Allow e-mail addresses with hyphens (jQuery? PHP?).

LONG-TERM NICE-TO-HAVES as of 2014.04.03:

- E-mail logic using PHPMailer which sends custom or form e-mails, perhaps with
resume attachments (e.g. resumes), to contacts while logging said activity into
Logs. Limitations within my present environment might prevent this for a while.
- PDF versions of log lists, approximating the IDES "work search" forms, per
week-ending date.
- A section for networking -- a diary of sorts for one's activities at job
fairs, MeetUps and other events. Although there does not seem to be a provision
for such things in the IDES "work search" form, as far as I am concerned,
all forms of networking should count as credit for diligence in anyone's job
search.
- An area to upload resumes, cover letters, form-letter templates and so on.
- A jQuery Mobile version of the entire project. As in object-oriented
programming, this project may be my first earnest opportunity to learn jQuery
Mobile as well as my first earnest attempt to combine PHP with jQuery Mobile.
(Not interested re Android or iOS at the moment.)
- Updating those "immediate issues" notes.