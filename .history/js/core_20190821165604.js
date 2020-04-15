
var Core = function () {





};



/* trigger the functions */

window.addEventListener('DOMContentLoaded', function () {

    new Core();
    var dt = new Date(Date.now()).toISOString();
    formatGoogleCalendar.init({calendarUrl: 'https://www.googleapis.com/calendar/v3/calendars/heskethbankcommunitycentre.org.uk_3i6pu2nj7e67l9snfpk2tss75c@group.calendar.google.com/events?orderBy=startTime&showDeleted=false&singleEvents=true&timeMin=' + dt + '&key=AIzaSyDTdTCaKV8grIqu18s8XQ4n5QvCqDnwb5w',
        past: false,
        upcoming: true,
        sameDayTimes: true,
        dayNames: true,
        pastTopN: -1,
        upcomingTopN: 20,
        recurringEvents: true,
        itemsTagName: 'li',
        upcomingSelector: '#upcoming-events',
        format: ['*date*', '*summary*'],
        timeMin: undefined,
        timeMax: undefined});


/* handle the hover function for the menu */
    if (window.innerWidth <= 768) {

        /* set menu height */
        let nav = document.querySelector('nav#mainnav');
        nav.style.height = window.innerHeight + 'px';
        

    let menu = document.querySelectorAll('nav#mainnav li');
        Object.keys(menu).forEach(function(m) {
            if (menu[m].querySelector('ol')) {/* if there's a submenu */
                menu[m].querySelector('a').removeAttribute('href');
                
                menu[m].addEventListener('touchstart',function() {},true);
            }
            
        });
       
       
    }
});

