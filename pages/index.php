<article id="bannerholder" class="">
    <div class="cta" id="banner-run" data-delay="5000">
        <picture>
            <source media="(min-width:1200px)" srcset="<?= $this->sitepath('images/banners/hbvcc-front-lg.jpg') ?>">
            <source media="(max-width:768px)" srcset="<?= $this->sitepath('images/banners/hbvcc-front-md.jpg') ?>">
            <source media="(min-width:426px)" srcset="<?= $this->sitepath('images/banners/hbvcc-front-sm.jpg') ?>">
            <source media="(max-width:425px)" srcset="<?= $this->sitepath('images/banners/hbvcc-front-xs.jpg') ?>">
            <img src="<?= $this->sitepath('images/banners/hbvcc-front-lg.jpg') ?>" class="banner">
        </picture>

    </div>
</article>




<section class="three-col">

    <section id="fundraiser">
        <h4>Fundraising</h4>
        <p>For the past two years the committee has been working hard to raise funds for a brand new community centre fit for the twenty first century.</p>
        <p>After winning grants from The National Lottery, West Lancashire Borough Council, Hesketh Bank Parish Council, The Co-Op, Persimmon Homes and many others we are within sight of the <strong>&pound;394,000</strong> needed to complete our goal.</p>
<!-- logos -->
            <ul class="funding-logos">
                <li><img src="<?= $this->sitepath('images/logos/nlcf.png') ?>" alt="National Lottery Community Fund"></li>
                <li><img src="<?= $this->sitepath('images/logos/wlbc.png') ?>" alt="West Lancashire Borough Council"></li>
                <li><img src="<?= $this->sitepath('images/logos/hwbpc.png') ?>" alt="Hesketh With Becconsall Parish Council"></li>
                <li><img src="<?= $this->sitepath('images/logos/garfield-weston.png') ?>" alt="The Garfield Weston Foundation"></li>
                <li><img src="<?= $this->sitepath('images/logos/bernardsunley-logo.svg') ?>" alt="Bernard Sunley"></li>
                <li><img src="<?= $this->sitepath('images/logos/nfu-mutual.png') ?>" alt="NFU Mutual"></li>
                <li><img src="<?= $this->sitepath('images/logos/the-coop.jpg') ?>" alt="The Co-Op"></li>
                <li><img src="<?= $this->sitepath('images/logos/persimmon.png') ?>" alt="Persimmon Homes"></li>
            </ul>

        <figure>
        <img src="images/thermometer.png" class="therm">
        <figcaption>
          
            <p>We've come a long way but we're not quite there yet and we still need the help of you, our community, to get us to our final goal.</p>
            <p><em>How you can help.</em></p>
            <p><strong>Amazon Smile</strong></p>
            <p>If you shop online at Amazon, consider using Amazon Smile. For every eligible purchase you make a donation is made to the Community Centre, and best of all <em>there is no additional cost to you!</em></p>
            <a class="smile" href="https://smile.amazon.co.uk" target="_blank" rel="nofollow"><img src="<?= $this->sitepath('images/logos/amazonsmile.png') ?>" 
            alt="Visit Amazon Smile"><span>Visit smile.amazon.co.uk</span></a>
        <hr class="line"/>

    <p><strong>Your Local Co-Op</strong></p>
            <p>If you're a Co-Op member you can select Hesketh Bank Community Centre as your chosen charity. Every time you shop we'll receive a small donation <em>at no extra cost to you!</em></p>

            <hr class="line"/>
            <p><strong>Join-in With Our Events</strong></p>
            <p>We have a full calendar of events, usually  - from Artisan sales to live theatre. Currently we are involved in a virtual balloon race!</p>
            <p>By taking part not only will you have fun you'll also be supporting the future of your community.</p>

        </figcaption>
        </figure>
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
       
        <ul class="gallery">
            <li><img src="<?= $this->sitepath('images/pages/in-use-1.jpg') ?>" alt="In Use #1"></li>
            <li><img src="<?= $this->sitepath('images/pages/in-use-2.jpg') ?>" alt="In Use #2"></li>
            <li><img src="<?= $this->sitepath('images/pages/in-use-3.jpg') ?>" alt="In Use #3"></li>
            <li><img src="<?= $this->sitepath('images/pages/in-use-4.jpg') ?>" alt="In Use #4"></li>



        </ul>

    </section>



    <section id="media">
        <h4>Media</h4>
        <p>Hesketh Bank Community Centre has been busy on traditional media. You can catch up here.</p>

        <section class="radio" style="text-align:center">
            <h4>Listen to our very own Diane Earles on BBC Radio Lancashire talking about our upcoming Virtual Balloon Race</h4>
            <audio controls>
                <source src="<?= $this->sitepath('assets/audio/Radio Lancashire Balloon Race.mp3') ?>" type="audio/mp3">
            </audio>
        </section>

        <!-- <section class="radio" style="text-align:center">
            <h4>Did you catch us live on BBC Radio Lancashire? <span>Listen again below.</span></h4>
            <audio controls>
                <source src="<?= $this->sitepath('assets/audio/LANCS 2018 20 SEP HESKETH BANK.mp3') ?>" type="audio/mp3">
            </audio>
        </section> -->

        <iframe src="https://www.youtube.com/embed/rS_KvKR-afQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </section>

    <section id="downloads">
        <h4>Downloads</h4>
        <ul class="download-list">
            <li>You can download our latest newsletter <a href="<?= $this->sitepath('assets/downloads/HBCCNewsletterMarch2020.pdf') ?>" download="HBCC Newsletter March 2020.pdf">here.</a></li>
            <li>We are featured in the November issue of the Hesketh Bank Parish Council newsletter. Download it <a href="<?= $this->sitepath('assets/downloads/Newsletter-Nov-19.pdf') ?>" download="Love Hesketh Bank Newsletter - November 2019.pdf">here</a>.</li>
        </ul>

    </section>

    <section id="calendar">
        <h4>Calendar</h4>
        <p>Due to the COVID-19 lockdown we are, unfortunately, currently closed.</p>
        <p>Please check back again for our busy calendar of events, classes and clubs.</p>
        <ul id="upcoming-events"></ul>
    </section>


</section>