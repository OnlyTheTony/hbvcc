/* banner.js v2.
 * 
 * Traditional object version for production platforms
 * 
 * 15-11-18 - added swipe navigation to it 
 * 
 */
// Production steps of ECMA-262, Edition 6, 22.1.2.1
if (!Array.from) {
    Array.from = (function () {
        var toStr = Object.prototype.toString;
        var isCallable = function (fn) {
            return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
        };
        var toInteger = function (value) {
            var number = Number(value);
            if (isNaN(number)) {
                return 0;
            }
            if (number === 0 || !isFinite(number)) {
                return number;
            }
            return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
        };
        var maxSafeInteger = Math.pow(2, 53) - 1;
        var toLength = function (value) {
            var len = toInteger(value);
            return Math.min(Math.max(len, 0), maxSafeInteger);
        };

        // The length property of the from method is 1.
        return function from(arrayLike/*, mapFn, thisArg */) {
            // 1. Let C be the this value.
            var C = this;

            // 2. Let items be ToObject(arrayLike).
            var items = Object(arrayLike);

            // 3. ReturnIfAbrupt(items).
            if (arrayLike == null) {
                throw new TypeError('Array.from requires an array-like object - not null or undefined');
            }

            // 4. If mapfn is undefined, then let mapping be false.
            var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
            var T;
            if (typeof mapFn !== 'undefined') {
                // 5. else
                // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
                if (!isCallable(mapFn)) {
                    throw new TypeError('Array.from: when provided, the second argument must be a function');
                }

                // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
                if (arguments.length > 2) {
                    T = arguments[2];
                }
            }

            // 10. Let lenValue be Get(items, "length").
            // 11. Let len be ToLength(lenValue).
            var len = toLength(items.length);

            // 13. If IsConstructor(C) is true, then
            // 13. a. Let A be the result of calling the [[Construct]] internal method 
            // of C with an argument list containing the single item len.
            // 14. a. Else, Let A be ArrayCreate(len).
            var A = isCallable(C) ? Object(new C(len)) : new Array(len);

            // 16. Let k be 0.
            var k = 0;
            // 17. Repeat, while k < lenÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¦ (also steps a - h)
            var kValue;
            while (k < len) {
                kValue = items[k];
                if (mapFn) {
                    A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
                } else {
                    A[k] = kValue;
                }
                k += 1;
            }
            // 18. Let putStatus be Put(A, "length", len, true).
            A.length = len;
            // 20. Return A.
            return A;
        };
    }());
}


function Banner() {

       this.isOffer();
    this.delay = 5000;
    this.bannerElement = document.querySelector('#banner-run');
    if (!this.bannerElement) {
        return;
    }
    this.bannerElement.addEventListener('transitionend', function () {
        this.rebuildBanner();
    }.bind(this));
    this.bannerChildren = this.getChildCount();
    this.buildNavigation(); /*create a parent nav element */
    this.setChildRefs();
    
    this.navKids = (this.navigation) ? this.navigation.children : null;
    this.buttonCount = (this.navKidsw) ? this.navKids.length : 0;
    if (this.bannerChildren > 1) {
        
       this.setSwipeable(); 
    }
    
    this.run();
};
/* return the number of children for the parent banner */

Banner.prototype.getChildCount = function () {

    return this.bannerElement.children.length;
};

/**
 * 
 * Allocates IDs for the childnodes so we can navigate.
 * We do this by using the Object.keys method to apply the element's index within the parent node as a dataset value.
 * This can be used by the navigation to move between slides easily.
 * 
 */

Banner.prototype.setChildRefs = function () {
    Object.keys(this.bannerElement.children).forEach(function (i) {
        this.bannerElement.children[i].classList.add('bannerelement');
        this.bannerElement.children[i].dataset.banner = i;
        /* insert a new element into the banner navigation */
        try {
            this.navigation.appendChild(this.createNavButton(i));
        } catch (e) {
        }

    }.bind(this));
    /* insert the newly populated node into the DOM */
    try {
        this.bannerElement.parentNode.appendChild(this.navigation);
    } catch (e) {
    }
};


/*
 * Shift the first child element to the last after the transition has finished to create an infinite loop
 * 
 */

Banner.prototype.rebuildBanner = function () {

    let clientPos = this.bannerElement.getBoundingClientRect();
   
   if (clientPos.left < 0) {
        let c = this.bannerElement.children;
        this.bannerElement.appendChild(c[0]);
        this.bannerElement.style.transition = "none";
        this.bannerElement.style.transform = "none";
     
    }  
     this.runner = setTimeout(this.moveBanner.bind(this), this.delay);
};


/**
 * Trigger the transition
 * 
 */

Banner.prototype.moveBanner = function (swipe) {
let speed = (swipe) ? "0.5s" : "1s";
    this.bannerElement.style.transition = speed +" ease-in-out";
    this.bannerElement.style.transform = "translate3d(-100%,0,0)";
    this.doNavButton();
};




/**
 * 
 * Build the navigation array
 * 
 * 
 */

Banner.prototype.buildNavigation = function () {

    if (this.bannerChildren > 1) {
        this.navigation = document.createElement('ul');
        this.navigation.classList.add('bannernav');
        this.navigation.style.width = this.bannerElement.parentNode.offsetWidth + 'px';
    } else {
        
        document.querySelector('#bannerholder').style.paddingBottom = "0px";
        document.querySelector('#bannerholder').style.marginBottom = "0px";
        
    }
};


/**
 * 
 * @param {int} idx
 * @returns {DOMElement}
 */

Banner.prototype.createNavButton = function (idx) {

    let li = document.createElement('li');
    li.dataset.target = idx;
    li.classList.add('bannernav-button');
    li.onclick =  function (e) {

        this.shuffleBanners(e);

    }.bind(this);
    return li;
};

Banner.prototype.doNavButton = function () {

   let navNode = this.bannerElement.children[0];/* this will always be the currently displayed banner */
    this.doActiveNavButton();
};


Banner.prototype.doActiveNavButton = function (j) {


 let clientPos = this.bannerElement.getBoundingClientRect();
let l = clientPos.left; 
let _target = 0; 


if (l == 0) {
    let int = (j) ? 0 : 1;
        
        _target = this.bannerElement.children[int].dataset.banner;
   } else {
    _target = this.bannerElement.children[0].dataset.banner;
}

for (let c = 0;c < this.navKids.length; c++) {

    if (this.navKids[c].dataset.target == _target) {
        this.navKids[c].classList.add('active');
        
    } else {
         this.navKids[c].classList.remove('active');
    }
    
    
}
    


};


Banner.prototype.shuffleBanners = function (t) {
    /* cancel the current timeout so we can regenerate it later */
    clearTimeout(this.runner);
    let c = this.bannerElement.children;
    Object.keys(c).forEach(function (b) {
        if (parseInt(c[b].dataset.banner) === parseInt(t.target.dataset.target)) {
            let idx = Array.from(c).indexOf(c[b]);
            while (idx > 0) {
                this.bannerElement.appendChild(c[0]);
                this.bannerElement.style.transition = "none";
                this.bannerElement.style.transform = "none";
                idx--;
            }
            let actives = document.querySelectorAll('li.active');
            Object.keys(actives).forEach(function (a) {
                actives[a].classList.remove('active');

            }.bind(this));
            t.target.classList.add('active');
            this.runner = setTimeout(this.moveBanner.bind(this), this.delay);
        }
    }.bind(this));

};
/**
 * 
 * Pretty self explanatory
 */

Banner.prototype.run = function () {
    if (this.bannerChildren > 1) {
        this.doActiveNavButton(true);
        this.runner = setTimeout(this.moveBanner.bind(this), this.delay);
    }
};

/* make the banner navigable on mobile 
 * 
 */
Banner.prototype.setSwipeable = function () {

    var sDir,
            startX,
            distX,
            mindist = 20, /* minimum travel distance */
            restraint = 100, /* maximum up/down travel distance */
            runtime = 25, /* maximum swipe time allowed to trigger */
            elapsedTime,
            startTime;

    this.bannerElement.addEventListener('touchstart', function (e) {
        var touchObj = e.changedTouches[0];

        distX = 0;
        this.startPoint = touchObj.pageX;
        this.startTime = new Date().getTime();

    }.bind(this), {capture: false, passive: true});



    this.bannerElement.addEventListener('touchend', function (e) {
        var touchObj = e.changedTouches[0];

        distX = touchObj.pageX - this.startPoint;
        elapsedTime = new Date().getTime() - this.startTime;
        /* if the drag has gone on long enough */
        if (elapsedTime >= runtime) {
            /* and if the distance is more than 150 pixels */
            if (Math.abs(distX) >= mindist) {
                /* now handle the actual scrolling - managed in CSS, we just set the translation percentage here */

                if (distX < 0) {
                    clearTimeout(this.runner);
                    this.moveBanner(true);
             
                } else if (distX > 0) {
                    clearTimeout(this.runner);
                    this.bannerElement.style.transition = "none";
                    let lastChild = this.bannerElement.children[this.bannerElement.children.length - 1];/* shift the last element to the front  */
                    this.bannerElement.insertAdjacentElement('afterbegin', lastChild);
                    this.bannerElement.style.transform = "translate3d(-100%,0,0)";
                    let clientPos = this.bannerElement.getBoundingClientRect();
                    /* get the position */
                    if (clientPos.left < 0) {
                        this.bannerElement.style.transition = "all 0.5s ease-in-out";
                        this.bannerElement.style.transform = "translate3d(0%,0,0)";
                       this.doNavButton();
                    }
                 
                }
            }

        }
    }.bind(this), {capture: false, passive: true});


};

/* if we're on the landing page then we'll remove the banner on mobile */
Banner.prototype.isOffer = function() {
    let locArray = location.pathname.split('/');
    let baseName = locArray[locArray.length - 1];

    if (baseName === 'offers' && window.innerWidth <= 768) {
        document.querySelector('#bannerholder').parentNode.removeChild( document.querySelector('#bannerholder'));
    }
    
    
};


window.addEventListener('DOMContentLoaded', function () {
    new Banner();

});


