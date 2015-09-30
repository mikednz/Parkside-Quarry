<?php
	
// 	STOP! DO NOT MODIFY THIS FILE!
//	If you wish to customize the output, you can safely do so by COPYING this file
//	into a new folder called 'gigpress-templates' in your 'wp-content' directory
//	and then making your changes there. When in place, that file will load in place of this one.

// This template displays all of our individual show data in the sidebar.
// It's marked-up in hCalendar format, so fuck-around with caution.
// See http://microformats.org/wiki/hcalendar for specs

//	If you're curious what all variables are available in the $showdata array,
//	have a look at the docs: http://gigpress.com/docs/

?>

<h3><?php echo $showdata['date']; ?></h3>
<p><?php echo $showdata['venue']; ?>, 
<?php echo $showdata['time']; ?>, 
<?php echo $showdata['price']; ?>, 
<?php echo $showdata['address']; ?> 
<?php echo $showdata['city']; ?> 
<?php echo $showdata['country']; ?>, 
<?php echo $showdata['venue_phone']; ?>, 
<?php echo $showdata['notes']; ?>
</p> 
