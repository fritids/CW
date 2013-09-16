<?php
/***************************************************************************
 *                          lang_faq.php [english]
 *                            -------------------
 *   begin                : Wednesday Oct 3, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *
 *   $Id: lang_faq.php,v 1.4.2.3 2002/12/18 15:40:20 psotfx Exp $
 *
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

/* CONTRIBUTORS:
	2002-12-15	Philip M. White (pwhite@mailhaven.com)
		Fixed many minor grammatical problems.
*/
 
// 
// To add an entry to your FAQ simply add a line to this file in this format:
// $faq[] = array("question", "answer");
// If you want to separate a section enter $faq[] = array("--","Block heading goes here if wanted");
// Links will be created automatically
//
// DO NOT forget the ; at the end of the line.
// Do NOT put double quotes (") in your FAQ entries, if you absolutely must then escape them ie. \"something\"
//
// The FAQ items will appear on the FAQ page in the same order they are listed in this file
//
 
  

$faq[] = array("--","User Preferences and settings");
$faq[] = array("How do I change my settings?", "All your settings (if you are registered) are stored in the database. To alter them click the <u>Profile</u> link (generally shown at the top of pages but this may not be the case). This will allow you to change all your settings.");
$faq[] = array("The times are not correct!", "The times are almost certainly correct; however, what you may be seeing are times displayed in a timezone different from the one you are in. If this is the case, you should change your profile setting for the timezone to match your particular area, e.g. London, Paris, New York, Sydney, etc. Please note that changing the timezone, like most settings, can only be done by registered users. So if you are not registered, this is a good time to do so, if you pardon the pun!");
$faq[] = array("I changed the timezone and the time is still wrong!", "If you are sure you have set the timezone correctly and the time is still different, the most likely answer is daylight savings time (or summer time as it is known in the UK and other places). The board is not designed to handle the changeovers between standard and daylight time so during summer months the time may be an hour different from the real local time.");
$faq[] = array("My language is not in the list!", "The most likely reasons for this are either the administrator did not install your language or someone has not translated this board into your language. Try asking the board administrator if they can install the language pack you need or if it does not exist, please feel free to create a new translation. More information can be found at the phpBB Group website (see link at bottom of pages)");
$faq[] = array("How do I show an image below my username?", "There may be two images below a username when viewing posts. The first is an image associated with your rank; generally these take the form of stars or blocks indicating how many posts you have made or your status on the forums. Below this may be a larger image known as an avatar; this is generally unique or personal to each user. It is up to the board administrator to enable avatars and they have a choice over the way in which avatars can be made available. If you are unable to use avatars then this is the decision of the board admin and you should ask them their reasons (we're sure they'll be good!)");
$faq[] = array("How do I change my rank?", "In general you cannot directly change the wording of any rank (ranks appear below your username in topics and on your profile depending on the style used). Most boards use ranks to indicate the number of posts you have made and to identify certain users. For example, moderators and administrators may have a special rank. Please do not abuse the board by posting unnecessarily just to increase your rank -- you will probably find the moderator or administrator will simply lower your post count.");
$faq[] = array("When I click the email link for a user it asks me to log in.", "Sorry, but only registered users can send email to people via the built-in email form (if the admin has enabled this feature). This is to prevent malicious use of the email system by anonymous users.");


$faq[] = array("--","Posting Issues");
$faq[] = array("How do I post a topic in a forum?", "Easy -- click the relevant button on either the forum or topic screens. You may need to register before you can post a message. The facilities available to you are listed at the bottom of the forum and topic screens (the <i>You can post new topics, You can vote in polls, etc.</i> list)");
$faq[] = array("How do I edit or delete a post?", "Unless you are the board admin or forum moderator you can only edit or delete your own posts. You can edit a post (sometimes for only a limited time after it was made) by clicking the <i>edit</i> button for the relevant post.  If someone has already replied to the post, you will find a small piece of text output below the post when you return to the topic that lists the number of times you edited it. This will only appear if no one has replied; it also will not appear if moderators or administrators edit the post (they should leave a message saying what they altered and why). Please note that normal users cannot delete a post once someone has replied.");
$faq[] = array("How do I add a signature to my post?", "To add a signature to a post you must first create one; this is done via your profile. Once created you can check the <i>Add Signature</i> box on the posting form to add your signature. You can also add a signature by default to all your posts by checking the appropriate radio box in your profile. You can still prevent a signature being added to individual posts by un-checking the add signature box on the posting form.");
$faq[] = array("How do I create a poll?", "Creating a poll is easy -- when you post a new topic (or edit the first post of a topic, if you have permission) you should see a <i>Add Poll</i> form below the main posting box. If you cannot see this then you probably do not have rights to create polls. You should enter a title for the poll and then at least two options -- to set an option type in the poll question and click the <i>Add option</i> button. You can also set a time limit for the poll, 0 being an infinite amount. There will be a limit to the number of options you can list, which is set by the board administrator");
$faq[] = array("How do I edit or delete a poll?", "As with posts, polls can only be edited by the original poster, a moderator, or board administrator. To edit a poll, click the first post in the topic, which always has the poll associated with it. If no one has cast a vote then users can delete the poll or edit any poll option. However, if people have already placed votes only moderators or administrators can edit or delete it; this is to prevent people rigging polls by changing options mid-way through a poll");
$faq[] = array("Why can't I access a forum?", "Some forums may be limited to certain users or groups. To view, read, post, etc. you may need special authorization which only the forum moderator and board administrator can grant, so you should contact them.");
$faq[] = array("Why can't I vote in polls?", "Only registered users can vote in polls so as to prevent spoofing of results. If you have registered and still cannot vote then you probably do not have appropriate access rights.");


$faq[] = array("--","Formatting and Topic Types");
$faq[] = array("What is BBCode?", "BBCode is a special implementation of HTML. Whether you can use BBCode is determined by the administrator. You can also disable it on a per post basis from the posting form. BBCode itself is similar in style to HTML: tags are enclosed in square braces [ and ] rather than &lt; and &gt; and it offers greater control over what and how something is displayed. For more information on BBCode see the guide which can be accessed from the posting page.");
$faq[] = array("Can I use HTML?", "That depends on whether the administrator allows you to; they have complete control over it. If you are allowed to use it, you will probably find only certain tags work. This is a <i>safety</i> feature to prevent people from abusing the board by using tags which may destroy the layout or cause other problems. If HTML is enabled you can disable it on a per post basis from the posting form.");
$faq[] = array("What are Smileys?", "Smileys, or Emoticons, are small graphical images which can be used to express some feeling using a short code, e.g. :) means happy, :( means sad. The full list of emoticons can be seen via the posting form. Try not to overuse smileys, though, as they can quickly render a post unreadable and a moderator may decide to edit them out or remove the post altogether.");
$faq[] = array("Can I post Images?", "Images can indeed be shown in your posts. However, there is no facility at present for uploading images directly to this board. Therefore you must link to an image stored on a publicly accessible web server, e.g. http://www.some-unknown-place.net/my-picture.gif. You cannot link to pictures stored on your own PC (unless it is a publicly accessible server) nor to images stored behind authentication mechanisms such as Hotmail or Yahoo mailboxes, password-protected sites, etc. To display the image use either the BBCode [img] tag or appropriate HTML (if allowed).");
$faq[] = array("What are Announcements?", "Announcements often contain important information and you should read them as soon as possible. Announcements appear at the top of every page in the forum to which they are posted. Whether or not you can post an announcement depends on the permissions required, which are set by the administrator.");
$faq[] = array("What are Sticky topics?", "Sticky topics appear below any announcements in viewforum and only on the first page. They are often quite important so you should read them where possible. As with announcements the board administrator determines what permissions are required to post sticky topics in each forum.");
$faq[] = array("What are Locked topics?", "Locked topics are set this way by either the forum moderator or board administrator. You cannot reply to locked topics and any poll contained inside is automatically ended. Topics may be locked for many reasons.");


$faq[] = array("--","User Levels and Groups");
$faq[] = array("What are Administrators?", "Administrators are people assigned the highest level of control over the entire board. These people can control all facets of board operation which include setting permissions, banning users, creating usergroups or moderators, etc. They also have full moderator capabilities in all the forums.");
$faq[] = array("What are Moderators?", "Moderators are individuals (or groups of individuals) whose job it is to look after the running of the forums from day to day. They have the power to edit or delete posts and lock, unlock, move, delete and split topics in the forum they moderate. Generally moderators are there to prevent people going <i>off-topic</i> or posting abusive or offensive material.");
$faq[] = array("What are Usergroups?", "Usergroups are a way in which board administrators can group users. Each user can belong to several groups (this differs from most other boards) and each group can be assigned individual access rights. This makes it easy for administrators to set up several users as moderators of a forum, or to give them access to a private forum, etc.");
$faq[] = array("How do I join a Usergroup?", "To join a usergroup click the usergroup link on the page header (dependent on template design) and you can then view all usergroups. Not all groups are <i>open access</i> -- some are closed and some may even have hidden memberships. If the board is open then you can request to join it by clicking the appropriate button. The user group moderator will need to approve your request; they may ask why you want to join the group. Please do not pester a group moderator if they turn your request down -- they will have their reasons.");
$faq[] = array("How do I become a Usergroup Moderator?", "Usergroups are initially created by the board administrator who also assigns a board moderator. If you are interested in creating a usergroup then your first point of contact should be the administrator, so try dropping them a private message.");


//
// These entries should remain in all languages and for all modifications
//
$faq[] = array("--","phpBB 2 Issues");
$faq[] = array("Who wrote this bulletin board?", "This software (in its unmodified form) is produced, released and is copyrighted <a href=\"http://www.phpbb.com/\" target=\"_blank\">phpBB Group</a>. It is made available under the GNU General Public License and may be freely distributed; see link for more details");
$faq[] = array("Why isn't X feature available?", "This software was written by and licensed through phpBB Group. If you believe a feature needs to be added then please visit the phpbb.com website and see what the phpBB Group has to say. Please do not post feature requests to the board at phpbb.com, as the Group uses sourceforge to handle tasking of new features. Please read through the forums and see what, if any, our position may already be for features and then follow the procedure given there.");
$faq[] = array("Whom do I contact about abusive and/or legal matters related to this board?", "You should contact the administrator of this board. If you cannot find who that is, you should first contact one of the forum moderators and ask them who you should in turn contact. If still get no response you should contact the owner of the domain (do a whois lookup) or, if this is running on a free service (e.g. yahoo, free.fr, f2s.com, etc.), the management or abuse department of that service. Please note that phpBB Group has absolutely no control and cannot in any way be held liable over how, where or by whom this board is used. It is absolutely pointless contacting phpBB Group in relation to any legal (cease and desist, liable, defamatory comment, etc.) matter not directly related to the phpbb.com website or the discrete software of phpBB itself. If you do email phpBB Group about any third party use of this software then you should expect a terse response or no response at all.");

//
// This ends the FAQ entries
//

?>