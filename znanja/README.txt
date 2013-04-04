znanja Content plugin for Moodle
================================

Version: v1.0.1 (2013040400)

Visit https://znanja.com/plugin/download for the latest documentation for this
plugin.

You will need an account with znanja.  Visit https://znanja.com/demo for a
demonstration.

This plugin is licensed under the GPL v3.  See LICENSE.txt for more information.

About
=====

znanja is the quickest way to get your content into eLearning.

We wanted to make getting your content into Moodle even quicker.

znanja's Content plugin allows you to import content from znanja into Moodle in
three easy steps:

1. Add a "znanja content" activity
2. Choose your content from znanja
3. Save

That's it! Your content is imported as a SCORM package, all from within Moodle.

Requirements
============

* You must be using Moodle 2.2 or newer.  We cannot guarantee the plugin will
  work on older versions.

* The SCORM package activity module must be installed.  This is usually
  installed by default.  If you are able to add SCORM packages to a course in
  Moodle, then you're good to go.

* You must enable downloadable SCORM packages.  This setting can be found at:
  Site administration → Plugins → Activity modules → SCORM package → Admin
  settings → Enable downloaded package type.

* Windows only: You must be using PHP 5.3.7 or newer.  Older versions do not
  provide a way to configure cURL to use HTTPS properly.  This means the Windows
  XAMPP installer for Module will not work, since it is bundled with an older
  version of XAMPP and PHP.

Installation
============

1. Windows only: Configure the cURL PHP module (see below).

2. Extract this .zip file into the mod/ folder of your Moodle instance.  There
   should now be a znanja/ folder in your mod/ folder.

3. Log into Moodle as an administrator.

4. You should now see a "Plugins check" screen.  Click "Upgrade Moodle database
   now" at the bottom.  Your Moodle database will be updated and the plugin will
   now be installed.

Configuring cURL (Windows only)
-------------------------------

For security purposes, content delivered from znanja to Moodle are sent over SSL
(i.e., HTTPS or TLS).  Unfortunately, the cURL PHP module (used to retrieve data
from znanja) does not properly verify SSL certificates on Windows by default.
Thus, you will encounter an error if you use the znanja module without
configuring cURL first.

Please note, you must be using PHP 5.3.7 or newer for this to work.

1. Download http://curl.haxx.se/ca/cacert.pem and save it to some location that
   can be accessed by PHP (we recommend PHP's installation folder).  This is a
   bundle of various SSL certificates.

2. Edit php.ini and add a line at the bottom:

   curl.cainfo = "C:\my\path\to\cacert.pem"

   This is the absolute path to the cacert.pem file you just downloaded.

3. Restart your web server (e.g., Apache).

Usage
=====

1. Log into an account in Moodle that has permission to modify a course.

2. On the homepage, you should see your list of available courses.  Select the
   course into which you would like to import a znanja content.

3. Now you should see the activity calendar for the course.  Click "Turn editing
   on" in the top-right corner.

4. Click "Add an activity or resource" on any of the available time slots.

5. Select the "znanja content" activity and click "Add".  You will be taken to a
   form for selecting your znanja content, filling in some details, and tweaking
   some SCORM package settings.

6. You should now see your znanja content list.  If you are not logged into
   znanja, you will be prompted to do so.  Ultimately, you will want to select
   the content to import, but there are a couple things you can do here.  In the
   top-right corner, you can "open znanja in a new tab".  This is a convenient
   way to jump to znanja, if you want to do a bit of editing before importing
   the content.  You can also change your active organization via the normal
   dropdown.

7. If your organization has at least one export license (contact us if you don't
   have any), now you can select the content to import.  Click "Select" beside
   the content and you will see its name and description will be populated in
   the fields below the content list.  A license will not be used until you
   actually hit "Save" in Moodle.

8. Feel free to modify the activity name or other settings on this page.  These
   are the standard settings that Moodle provides for SCORM packages.  Once you
   are ready, click either the "Save and return to course" or "Save and display"
   buttons at the very bottom.

9. Your znanja content will now be added as an activity.  This may take a
   moment, since znanja will be exporting the content to a SCORM package and
   that package will be downloaded and saved to your Moodle instance.

Uninstallation
==============

1. Log into Moodle as an administrator.

2. Under Site administration → Plugins → Plugins overview, click "Uninstall"
   beside the znanja plugin and confirm.

3. Delete the mod/znanja/ folder in your Moodle installation.
