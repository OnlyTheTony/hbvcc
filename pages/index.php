<picture>
    <source media="(min-width:769px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre.jpg') ?>">
    <source media="(max-width:768px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-mid.jpg') ?>">
    <source media="(max-width:640px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-sm.jpg') ?>">
    <source media="(max-width:425px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-xs.jpg') ?>">
    <img src="<?= $this->sitepath('images/hesketh-bank-community-centre.jpg') ?>" class="banner">
</picture>
<section class="two-col-right">
    <section>
        <h4>Welcome</h4>
        <p>Situated next to Hesketh Bank AFC's ground on Station Road, Hesketh Bank, the Community Centre consists of two large halls, providing safe, non-denominational facilities for the villages of Hesketh Bank, Banks, Tarleton and beyond.</p>
        <p>Whether there is just a small number of you or up to a hundred people we can provide a room to meet your requirements.</p>
        <p><strong>We currently provide facilities for:</strong></p>
        <ul>
            <li>Dance &amp; Fitness</li>
            <li>Education</li>
            <li>Meetings</li>
            <li>After-school clubs</li>
            <li>Local societies</li>
        </ul>
        <p>Additionally, our Multi-Use Games Area, or <a href="<?= $this->sitepath('our-facilities/muga') ?>">MUGA</a>, provides a safe environment for people of all ages to participate in football, basketball and other sports.</p>
        <p><a href="<?= $this->sitepath('contact') ?>">Get in touch</a> to see how we can help.</p>
    </section>    
    <section>
        <h4>Upcoming Events</h4>
        <ul id="upcoming-events"></ul>
    </section>    


</section>    
