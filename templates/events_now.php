<!DOCTYPE html>
<link href="css/style_events_now.css" rel="stylesheet">
<link href="css/layout_events_now.css" rel="stylesheet">
<link href="css/responsive_events_now.css" rel="stylesheet">


<br>
<h1 id="eventsNOW">EVENTS NOW</h1>
<section class = "displayControlBar">
    <form id = "search" action="events_now.php">
        <input type="text" name = "name" placeholder="Name of Event">
        <input type="text" name = "local" placeholder="Location">
        <input type="submit" value="Search">
    </form>
    <form id="setPages" action="events_now.php">
        <input type="hidden" name = "page" value=1>
        <input type="number" name = "eventsPage" placeholder="Events per Page" value=<?=$eventsPage?>>
        <label for="eventsPage">Events per Page</label>
        <input type="submit" value="Paginate">
    </form>

</section>

<section class = 'listEvents'>

<?php 
    foreach($events as $event) { 
        $eventId = $event['id'];
        $maxNumParticipants = computeMaxNumParticipantsById($eventId);
        $priceMin = computePriceMinById($eventId);
        $priceMax = computePriceMaxById($eventId);
        $dateStart = dateToString($event['date_start']);
        $dateEnd = dateToString($event['date_end']);
        
        $dateRange = simplifyDateRange($dateStart, $dateEnd);
        $priceRange = simplifyPriceRange($priceMin, $priceMax);
?>

<article class = "textEvents">
    <img src="images/events/<?=$eventId?>.jpg">
    <h3>
        <a href="event_details.php?id=<?=$eventId?>"> 
            <?=$event['name']?>
            <i class="fas fa-arrow-right"></i>
        </a>
    </h3>
    <p class='pEvents'>
        <i class="far fa-calendar"></i><?=$dateRange?> <br>
        <i class="fas fa-map-marker-alt"></i><?=$event['local']?> <br>
        <i class="fas fa-euro-sign"></i><?= $priceRange?><br>
        <i class="fas fa-user-friends"></i>Up to <?=$maxNumParticipants?> participants
    
    </p>
</article>

        
    <?php } ?>
</section>

<?php if(isset($page)) {?>
    <div class="pagination">
            <?php if ($page == 1 && $numberOfPages > 1) { ?>
                <a class = "hiddenAnchor"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a href="?page=<?=$page+1?>&eventsPage=<?=$eventsPage?>"><i class="fas fa-greater-than"></i></a>

            <?php } elseif ($page > 1 && $page < $numberOfPages) { ?>
                <a href="?page=<?=$page-1?>&eventsPage=<?=$eventsPage?>"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a href="?page=<?=$page+1?>&eventsPage=<?=$eventsPage?>"><i class="fas fa-greater-than"></i></a>
            
            <?php } elseif ($page == $numberOfPages && $numberOfPages != 1 ) { ?>
                <a href="?page=<?=$page-1?>&eventsPage=<?=$eventsPage?>"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a class = "hiddenAnchor"><i class="fas fa-greater-than"></i></a>
            
            <?php } elseif ($page == $numberOfPages && $numberOfPages == 1 ) { ?>
                <a class = "hiddenAnchor"><i class="fas fa-less-than"></i></a>
                <?=$page?> / <?=$numberOfPages?>
                <a class = "hiddenAnchor"><i class="fas fa-greater-than"></i></a>
            
            <?php }?>
    
    </div>
<?php } ?>