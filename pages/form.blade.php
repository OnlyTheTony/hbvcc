{!! Form::open(['url'=>$dealer.'/test-drive/complete','method'=>'post','id'=>'testdrive']) !!}
        {!! Form::hidden('dealer',$dealer_slug,['id'=>'dealer']) !!}
        {!! Form::hidden('source','',['id'=>'source']) !!}
       {{-- iterate the values submitted from the previous form --}}
        @foreach($drive as $d)
         <input type="hidden" name="drive[]" value="{!! $d !!}">
        @endforeach
        <fieldset>
        {{-- now the actual form fields --}}
        <p>
            {!! Form::text('firstname','',['required'=>'required','id'=>'firstname','autocomplete'=>'given-name']) !!}
        {!! Form::label('firstname','First Name') !!}</p>
        <p>
            {!! Form::text('surname','',['required'=>'required','id'=>'surname','autocomplete'=>'family-name']) !!}
        {!! Form::label('surname','Surname') !!}</p>
        <p>
            {!! Form::text('postcode','',['required'=>'required','id'=>'postcode','autocomplete'=>'postal-code']) !!}
        {!! Form::label('postcode','Postcode') !!}</p>
        <p>
            {!! Form::email('email','',['required'=>'required','id'=>'email','autocomplete'=>'email']) !!}
        {!! Form::label('email','Email') !!}</p>
        <p>{!! Form::input('tel','telephone','',['required'=>'required','id'=>'td_telephone','autocomplete'=>'tel','pattern'=>'^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$']) !!}
            {!! Form::label('td_telephone','Telephone') !!}
        </p>
        <div class="g-recaptcha" data-sitekey="6Le_wUcUAAAAAB9jjIzKg24xE1tEHWTdX4_XdeIr" id="captchaBlock"></div>

         <p><button class="sub-btn">Book Now</button></p>
        </fieldset>
        {!! Form::close() !!}
        @include('iveco::sections.gdpr')
        <script type="text/javascript">
            
            
             var onloadCallback = function() {
        grecaptcha.render('captchaBlock', {
          'sitekey' : '6Le_wUcUAAAAAB9jjIzKg24xE1tEHWTdX4_XdeIr'
        });
      };
    
    var Form = function () {
    
    var test = document.createElement('input');
    this.native = ("required" in test) ? true : false;
    this.formname = '#testdrive';
    this.form = document.querySelector(this.formname);
    this.inputs = this.form.querySelectorAll('input');
    this.defaultError = "Please fill in this field.";
    this.version = null;
    /* get the key for checking at google */
   // this.captcha = document.querySelector('.g-recaptcha').dataset.sitekey;
 
    if (navigator.userAgent.indexOf('Safari') !== -1) {
      this.version = /Version\/(\d{1,})\..*/.exec(navigator.userAgent);/* only safari contains the Version string - makes it easier */
    }
        this.url = document.querySelector(this.formname).getAttribute('data-url');
    this.phoneMatch = /^(?:(?:\(?(?:0(?:0|11)\)?[\s-]?\(?|\+)44\)?[\s-]?(?:\(?0\)?[\s-]?)?)|(?:\(?0))(?:(?:\d{5}\)?[\s-]?\d{4,5})|(?:\d{4}\)?[\s-]?(?:\d{5}|\d{3}[\s-]?\d{3}))|(?:\d{3}\)?[\s-]?\d{3}[\s-]?\d{3,4})|(?:\d{2}\)?[\s-]?\d{4}[\s-]?\d{4}))(?:[\s-]?(?:x|ext\.?|\#)\d{3,4})?$/;
    this.init = function () { 
       this.checkNative();
        this.setClearTrigger();
    };
    this.checkNative = function () {

        var _btn = this.form.querySelector('.sub-btn');
        _btn.addEventListener('click', function (e) {
           this.s = new Source();
            
            /* we'll only trigger the fallback if the browser is safari less than version 10 */
        if (this.version && parseInt(this.version[1]) < 10) 
        {
            e.preventDefault();  
             if (grecaptcha.getResponse()) {
           this.checkForm();
           
            } else {
                 alert("Please confirm you are not a robot!");
                
            }
                
            } else {
            if (this.form.checkValidity()) {
                e.preventDefault();
                if (grecaptcha.getResponse()) {
                this.checkPostcodeAgainstDealer();
            } else {
                alert("Please confirm you are not a robot!");
                
                
            }      }
            } 
        }.bind(this));
    };
    this.checkForm = function () {
        /* clear any current error displays */
        this.clearErrors();
        var _requiredFieldsArray = document.querySelectorAll('input');
        var _isGood = true;/* be positive!! */
        /* iterate the required fields */
        var _rfl = _requiredFieldsArray.length;
        for (var a = 0; a < _rfl; ++a) {
            var _r = _requiredFieldsArray[a];
            if (_r.getAttribute('required')) {
                if (!_r.value) {
                    var _errorSuffix = (_r.dataset.error) ? '<span>' + _r.dataset.error + '</span>' : '';
                    _r.focus();
                    _r.scrollIntoView();
                    /* if things aren't looking good (if the field is empty) */
                    var _p = _r.parentNode;
                    var _error = document.createElement('div');
                    _error.setAttribute('class', 'errorbox');
                    _error.innerHTML = this.defaultError + _errorSuffix;
                    _p.appendChild(_error);
                    _isGood = false;
                    break;
                }
            }
            if (_r.type === 'tel' && _r.value && !this.phoneMatch.test(_r.value)) {
                 var _p = _r.parentNode;
                _r.focus();
                var _error = document.createElement('div');
                _error.setAttribute('class', 'errorbox');
                _error.classList.add('phone');
                _error.innerHTML = 'Please enter a valid phone number';
                _p.appendChild(_error);
                _isGood = false;
            }
            /* now make sure the email format is correct */
            if (_r.type === 'email' && _r.value && !this.emailFormat(_r.value)) {
                var _p = _r.parentNode;
                _r.focus();
                var _error = document.createElement('div');
                _error.setAttribute('class', 'errorbox');
                _error.classList.add('email');
                _error.innerHTML = 'Please check your email address';
                _p.appendChild(_error);
                _isGood = false;
            }
        }

        if (_isGood) {
        /* if we haven't encountered any errors */
            this.checkPostcodeAgainstDealer();
               }
        };
   
    this.emailFormat = function (e) {
        var emailPattern = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
        if (!e || !emailPattern.test(e)) {
            return false;
        } else if (e && emailPattern.test(e)) {
            return true;
        }
    };
    this.setClearTrigger = function () {

        for (var i in this.inputs) {

            if (this.inputs.hasOwnProperty(i.match(/[0-9]{1}/))) {
                this.inputs[i].addEventListener('keyup', function (e) {
                    if (e.target.nextElementSibling) {
                        e.target.parentNode.removeChild(e.target.nextSibling);
                    }
                }.bind(this));
            }
        }
    };
    this.clearErrors = function () {
        /* clean slate for retries */
        var errors = document.querySelectorAll('.errorbox');
        var el = errors.length;
        if (el) {
            for (var e = el; e >= 0; e--) {/* have to iterate the array in reverse */
                if (errors[e]) {
                    errors[e].parentNode.removeChild(errors[e]);
                }
            }
        }

    },
    this.checkPostcodeAgainstDealer = function() {
       
        var pCode = document.querySelector('#postcode').value;
        var dealer = document.querySelector('#dealer').value;
        var token = document.querySelector('input[name=_token]').value;
        var xhr = new XMLHttpRequest();
        var currAction = this.form.action;
        var checkUrl = currAction.replace(/complete/,'check');/* modify the URL for checking */
        var postUrl = checkUrl+'?postcode='+pCode+'&_token='+token;
        xhr.open("GET",postUrl);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            var res = JSON.parse(xhr.responseText);
            if (res.action === 'okay') {
                this.s.clearSession();
                let g = new GDPR;
                g.getConsentForm('test_drive',document.querySelector('#testdrive'));
                return;
             //  this.form.submit();
            } else {
               this.doPostcodeDealerDialog(res.slug,res.dealer); 
               return false;
            }
        }
        }.bind(this);
         xhr.send();  
        
    },
    this.doPostcodeDealerDialog = function(slug,dealername) {
    if (slug) {
      this.slug = slug;
      this.dealername = dealername;
      
      
  var _f = document.createDocumentFragment();
  var _d = document.createElement('div');
  var _o = document.createElement('div');
  var _h = document.createElement('h1');
  var _p = document.createElement('p');
  var _b = document.createElement('button'); /* close/okay button */
  var _c = document.createElement('button');
  _b.innerText = 'Yes, I agree.';
  _c.innerText = 'No, please send to my selected dealer.';
  _c.style.marginTop = '10px';
  
      _c.addEventListener('click',function(e) {
       var _i = document.createElement('input');
       _i.type = "hidden";
       _i.name = "additional";
       _i.value = "User chose dealer outside of selected dealer’s area of responsibility.";
       this.form.appendChild(_i);
        this.s.clearSession();
           let g = new GDPR;
                 g.getConsentForm('test_drive',document.querySelector('#testdrive'));
      // this.form.submit();
     }.bind(this));
  
  
  _b.addEventListener('click',function(e) {
      this.form.action = document.location.origin+'/'+this.slug+'/test-drive/complete';
<<<<<<< HEAD
      this.s.clearSession();
        this.form.submit();
=======
         let g = new GDPR;
                 g.getConsentForm('test_drive',document.querySelector('#testdrive'));
        //  this.form.submit();
>>>>>>> dev
  }.bind(this));
 
    
    var fullMsg = 'Please confirm that you agree to redirect your inquiry to <strong>'+this.dealername+'</strong> instead.';
    
    _h.innerText = 'You do not appear to be in your selected dealer’s area of responsibility.';
    _p.innerHTML = fullMsg;
    _d.setAttribute('id','dialog');
    _d.classList.add('testdrive');
    _o.classList.add('overlay');
    
    _d.appendChild(_h);
    _d.appendChild(_p);
    _d.appendChild(_b);
    _d.appendChild(_c);
    _f.appendChild(_o);
    _f.appendChild(_d);
    if (!document.querySelector('.overlay')) {
    document.body.appendChild(_f);
    }
       
        
}     
    };
};


/* trigger the form checker */
window.addEventListener('load', function () {

    var f = new Form();
    f.init();
});
    
 </script>
