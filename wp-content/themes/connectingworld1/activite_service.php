
<style>
  ul.simple{
width: 100% ;
}
ul.simple li {
display:block;
width : 33%;
height : 34px;
float:left;
}
ul.simple li[float="left"] + li {
float:none;
}  
</style>

<?php



/*
Template Name: activite_service
*/

get_header(); ?>
 
<div id="content" >
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
		  
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="cover">
  <div class="entry" style="padding-top:5px;">


<?php the_content('Read the rest of this entry &raquo;');?>

<div style="float:left;width:310px;margin-right:10px;overflow:hidden">
<h1>Activities &amp; Services</h1>
<div>
<p>
<strong>Activities &amp; Services&nbsp;&nbsp; </strong>
<br>
Activities and services are important key words in each and every CW Global Business Group. Activities and services are to be offered to the members within a number of areas. A group must never become static and stall in its development and expansion into new markets, if it wants to become successful.
<br>
<br>
Here are some examples of activities and services that can be arranged and offered in our face-to-face service, and some even through our Internet service, to the groups.
<br>
<br>
•&nbsp;&nbsp;&nbsp; Lectures and Seminars
<br>
•&nbsp;&nbsp;&nbsp; Road Shows
<br>
•&nbsp;&nbsp;&nbsp; Business Education &amp; Courses
<br>
•&nbsp;&nbsp;&nbsp; Business Travel
<br>
•&nbsp;&nbsp;&nbsp; Business Cultural School
<br>
•&nbsp;&nbsp;&nbsp; Fairs &amp; Exhibitions
<br>
•&nbsp;&nbsp;&nbsp; One Company Show
<br>
•&nbsp;&nbsp;&nbsp; One Group Show
<br>
•&nbsp;&nbsp;&nbsp; Mentor Service
<br>
•&nbsp;&nbsp;&nbsp; Translation and Interpreter Agency
<br>
•&nbsp;&nbsp;&nbsp; CW GBG News Letter - circulated internally only to CW GBG members
<br>
•&nbsp;&nbsp;&nbsp; Support and distribution of the group's or the group members' own newsletter with commercial offers to the CW's member companies in the countries of the world
<br>
•&nbsp;&nbsp;&nbsp; Business Counselling
<br>
•&nbsp;&nbsp;&nbsp; Business Development
<br>
•&nbsp;&nbsp;&nbsp; Contact Service
<br>
•&nbsp;&nbsp;&nbsp; Information Service
<br>
•&nbsp;&nbsp;&nbsp; Secret Service Agency
<br>
•&nbsp;&nbsp;&nbsp; Expert Pool
<br>
•&nbsp;&nbsp;&nbsp; Board Services with Recruiment of Board Members
<br>
•&nbsp;&nbsp;&nbsp; Presentations of groups and group members on the CW Web Portal
</p>
</div>
</div>
		<div class="clear"></div>
 <?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

</div>
</div>

<?php endwhile; endif; ?>
</div>		
<?php get_footer(); ?>