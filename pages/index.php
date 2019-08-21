<article id="bannerholder" class="">
    <div class="cta" id="banner-run" data-delay="5000">
<picture>
    <source media="(min-width:769px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre.jpg') ?>">
    <source media="(max-width:768px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-mid.jpg') ?>">
    <source media="(max-width:640px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-sm.jpg') ?>">
    <source media="(max-width:425px)" srcset="<?= $this->sitepath('images/hesketh-bank-community-centre-xs.jpg') ?>">
    <img src="<?= $this->sitepath('images/hesketh-bank-community-centre.jpg') ?>" class="banner">
</picture>
        <picture>
         <img src="<?= $this->sitepath('images/muga-large.jpg') ?>">
        </picture>
    </div>
</article>
<section class="three-col">
    <section id="fundraiser">
         <h4>Latest Newsletter</h4>
        <p>You can download our latest newsletter <a href="<?= $this->sitepath('assets/downloads/HBCC-newsletter-10.pdf') ?>" download="HBCC Newsletter 10.pdf">here.</a></p>
        
        <h4>Annual Report 2018/19</h4>
        <p>Download our latest annual report <a href="<?= $this->sitepath('assets/downloads/HBCC Annual Report December 2018.pdf') ?>" download="HBCC Annual Report 2018.pdf">here.</a></p>
       
    </section>    
    
    <section id="media">

        <h4>Did you catch us live on BBC Radio Lancashire?<br/><span>Listen again below.</span></h4>
        <audio controls>
            <source src="<?= $this->sitepath('assets/audio/LANCS 2018 20 SEP HESKETH BANK.mp3') ?>" type="audio/mp3">
        </audio>
 
    </section>    
   <section id="copy">
         <h4>Welcome</h4>
        <p>Situated next to Hesketh Bank AFC's ground on Station Road, Hesketh Bank, the Community Centre consists of two large halls, providing safe, non-denominational facilities for the villages of Hesketh Bank, Banks, Tarleton and beyond.</p>
        <p>Whether there is just a small number of you or up to a hundred people we can provide a room to meet your requirements.</p>
        <p><strong>We currently provide facilities for:</strong></p>
        <ul>
            <li>Dance &amp; Fitness</li>
            <li>Education &amp; Social</li>
            <li>Meetings</li>
            <li>After-school clubs</li>
            <li>Local societies</li>
        </ul>
        <p>Additionally, our Multi-Use Games Area, or <a href="<?= $this->sitepath('our-facilities/muga') ?>">MUGA</a>, provides a safe environment for people of all ages to participate in football, basketball and other sports.</p>
        <p><a href="<?= $this->sitepath('contact') ?>">Get in touch</a> to see how we can help.</p>
   </section>
    <section id="calendar">
        <h4>Upcoming Events</h4>
        <p>We have a busy calendar of events with various courses, classes and clubs every week.</p>
        <ul id="upcoming-events"></ul>
    </section>    


</section>    
