<!DOCTYPE html>
<html>
    <head>
        <title>Hesketh Bank Community Centre</title>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->sitepath('images/favicons/apple-touch-icon.png') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->sitepath('images/favicons/favicon-32x32.png') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->sitepath('images/favicons/favicon-16x16.png') ?>">
        <link rel="manifest" href="<?= $this->sitepath('images/favicons/site.webmanifest') ?>">
        <link rel="mask-icon" href="<?= $this->sitepath('images/favicons/safari-pinned-tab.svg') ?>" color="#5bbad5">
        <link rel="shortcut icon" href="<?= $this->sitepath('images/favicons/favicon.ico') ?>">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="<?= $this->sitepath('images/favicons/browserconfig.xml') ?>">
        <meta name="theme-color" content="#ffffff">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= $this->sitepath('css/style.css') ?>">
        <meta name="description" content="Offering educational and recreational facilities to Hesketh Bank, Tarleton, Banks and surrounding areas.">
        <script type="text/javascript" src="<?= $this->sitepath('js/core.js') ?>"></script>
    </head>
    <body>
        <header>
            <figure>
            <img src="<?= $this->sitepath('images/common/hbcc-logo.png') ?>">
            <figcaption>
                <h1><span>Welcome To</span>Hesketh Bank Community Centre</h1>
               <!-- <h2>Supporting Hesketh Bank, Tarleton, Banks and Beyond</h2> -->
                <section id="header-contact">
                    <p><span class="fa fa-envelope-o"></span><a href="mailto:info@heskethbankcommunitycentre.org.uk">info@heskethbankcommunitycentre.org.uk</a></p>
                    <p><span class="fa fa-mobile"></span>07784 942127</p>
                    
                </section>    
            </figcaption>
            </figure>
            <nav id="mainnav">
                <ol>
                    <li><a href="/">Home</a></li>
                     <li><a href="<?= $this->sitepath('about') ?>">About</a>
                        <ol>
                            <li><a href="<?= $this->sitepath('about/our-history') ?>">Our History</a></li>
                            <li><a href="<?= $this->sitepath('about/today') ?>">Present Day</a></li>
                            <li><a href="<?= $this->sitepath('about/the-future') ?>">The Future</a></li>
                            <li><a href="<?= $this->sitepath('about/the-committee') ?>">The Committee</a></li>
                            
                        </ol>   
                    
                    </li>
                    <li><a href="<?= $this->sitepath('our-facilities') ?>">Our-Facilities</a>
                         <ol>
                            <li><a href="<?= $this->sitepath('our-facilities/the-halls') ?>">The Halls</a></li>
                            <li><a href="<?= $this->sitepath('our-facilities/muga') ?>">The MUGA</a></li>
                        </ol>   
                    
                    </li>
                   
                   
                    <li><a href="<?= $this->sitepath('contact') ?>">Contact Us</a></li>
                    <li class="volunteer"><a class="" href="<?= $this->sitepath('become-a-volunteer') ?>"><span class="fa fa-group"></span>Become A Volunteer</a></li>
                    
                </ol>
            </nav>    
        </header>
        <main>
             <?= $this->render($content) ?>
           
        </main>
        <footer>
            <ul class="imprint">
                <li>Hesketh Bank Community Centre<br/>
                    Station Road<br/>
                    Hesketh Bank<br/>
                    Preston<br/>
                    PR4 6SR
                </li>
                <li>Tel: 07784 942127<br/>
                    Email: <a href="mailto:info@heskethbankcommunitycentre.org.uk">info@heskethbankcommunitycentre.org.uk</a><br/>
                    UK Registered Charity: 52118.
                </li>
                <li>
                    <p class="social fa fa-facebook"><a href="https://www.facebook.com/heskethbankcommunitycentre/" target="_blank">heskethbankcommunitycentre</a></p>
                    <p class="social fa fa-twitter"><a href="https://twitter.com/heskethbankvcc" target="_blank">@heskethbankvcc</a></p>
                    <p class="social fa fa-instagram"><a href="https://www.instagram.com/heskethbankcommunitycentre/" target="_blank">heskethbankcommunitycentre</a></p>
                </li>    
                
            </ul>
            <p class="copy">&copy;<?= date("Y",time()) ?> Hesketh Bank Community Centre.</p>    

        </footer>    
    </body>
</html>
