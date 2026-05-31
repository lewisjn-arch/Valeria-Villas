
/* ----------------------------------------------------------------

[ Custom settings ]

01. ScrollIt
02. Navbar scrolling background
03. Close navbar-collapse when a  clicked
04. Sections background image from data background 
05. Isotope active
06. Animations
07. YouTubePopUp
08. Testimonials owlCarousel
09. Projects owlCarousel
10. Project Page owlCarousel - NEW
11. Blog owlCarousel
12. Team owlCarousel
13. Clients owlCarousel
14. Services owlCarousel
15. Team owlCarousel
16. MagnificPopup (Image, Youtube, Vimeo and custom popup)
17. Scroll back to top
18. Slider
19. Accordion Box
20. Preloader
21. Contact Form

------------------------------------------------------------------- */

$(function() {
    
    "use strict";
    
    // Preloader
	$("#preloader").fadeOut(700);
	$(".preloader-bg").delay(600).fadeOut(700);
    
    var wind = $(window);
    
    
    // ScrollIt
    $.scrollIt({
      upKey: 38,                // key code to navigate to the next section
      downKey: 40,              // key code to navigate to the previous section
      easing: 'swing',          // the easing function for animation
      scrollTime: 600,          // how long (in ms) the animation takes
      activeClass: 'active',    // class given to the active nav element
      onPageChange: null,       // function(pageIndex) that is called when page is changed
      topOffset: -70            // offste (in px) for fixed top navigation
    });
    
    // Navbar scrolling background
    wind.on("scroll",function () {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo> img");
        if(bodyScroll > 100){
            navbar.addClass("nav-scroll");
            logo.attr('src', 'img/logo.png');
        }else{
            navbar.removeClass("nav-scroll");
            logo.attr('src', 'img/logo.png');
        }
    });
    
    // Close navbar-collapse when a  clicked
    $(".navbar-nav .dropdown-item a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });
    
    
    // Close mobile menu "on click"
    $(function(){ 
         var navMain = $(".navbar-collapse");
         navMain.on("click", "a", null, function () {
             navMain.collapse('hide');
         });
     });
    
    // Sections background image from data background
    var pageSection = $(".bg-img, section");
    pageSection.each(function(indx){
        if ($(this).attr("data-background")){
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    
    // Isotope Active Masonry Gallery
	$('.bauen-gallery-items').imagesLoaded(function () {
		// Add isotope on click filter function
		$('.bauen-gallery-filter li').on('click', function () {
			$(".bauen-gallery-filter li").removeClass("active");
			$(this).addClass("active");
			var selector = $(this).attr('data-filter');
			$(".bauen-gallery-items").isotope({
				filter: selector
				, animationOptions: {
					duration: 750
					, easing: 'linear'
					, queue: false
				, }
			});
			return false;
		});
		$(".bauen-gallery-items").isotope({
			itemSelector: '.single-item'
			, layoutMode: 'masonry'
		, });
	});

    // Animations
    var contentWayPoint = function () {
        var i = 0;
        $('.animate-box').waypoint(function (direction) {
            if (direction === 'down' && !$(this.element).hasClass('animated')) {
                i++;
                $(this.element).addClass('item-animate');
                setTimeout(function () {
                    $('body .animate-box.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            }
                            else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            }
                            else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            }
                            else {
                                el.addClass('fadeInUp animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, {
            offset: '85%'
        });
    };
    $(function () {
        contentWayPoint();
    });
    
    // YouTubePopUp
    $("a.vid").YouTubePopUp();
    
    
    // Projects owlCarousel
    $('.projects .owl-carousel').owlCarousel({
        loop: true
        , margin: 30
        , mouseDrag: true
        , autoplay: false
        , dots: true
        , autoplayHoverPause:true
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
            , }
            , 600: {
                items: 2
            }
            , 1000: {
                items: 2
            }
        }
    });
    
      // Project Page owlCarousel
    $('.project-page .owl-carousel').owlCarousel({
        loop: true
        , margin: 30
        , mouseDrag: true
        , autoplay: false
        , dots: false
        , nav: true
        , navText: ['<i class="ti-arrow-left" aria-hidden="true"></i>', '<i class="ti-arrow-right" aria-hidden="true"></i>']
        , responsiveClass: true
        , responsive: {
            0: {
                items: 1
            , }
            , 600: {
                items: 1
            }
            , 1000: {
                items: 1
            }
        }
    });

    
    // MagnificPopup
    $(".img-zoom").magnificPopup({
        type: "image"
        , closeOnContentClick: !0
        , mainClass: "mfp-fade"
        , gallery: {
            enabled: !0
            , navigateByImgClick: !0
            , preload: [0, 1]
        }
    })
    $('.magnific-youtube, .magnific-vimeo, .magnific-custom').magnificPopup({
        disableOn: 700
        , type: 'iframe'
        , mainClass: 'mfp-fade'
        , removalDelay: 300
        , preloader: false
        , fixedContentPos: false
    });
    
    //  Scroll back to top
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });
    jQuery('.progress-wrap').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    })
    
});

// Slider 
$(document).ready(function() {
    var owl = $('.header .owl-carousel');
    // Slider owlCarousel
    $('.slider .owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        dots: false,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
         nav: true,
         navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
    // Slider owlCarousel
    $('.slider-fade .owl-carousel').owlCarousel({
        items: 1,
        loop:true,
        dots: false,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        nav: true,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
    });
    owl.on('changed.owl.carousel', function(event) {
        var item = event.item.index - 2;     // Position of the current item
        $('h4').removeClass('animated fadeInUp');
        $('h1').removeClass('animated fadeInUp');
        $('p').removeClass('animated fadeInUp');
        $('.butn-light').removeClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
        $('.owl-item').not('.cloned').eq(item).find('.butn-light').addClass('animated fadeInUp');
    });
});

// Accordion Box
if ($(".accordion-box").length) {
    $(".accordion-box").on("click", ".acc-btn", function () {
      var outerBox = $(this).parents(".accordion-box");
      var target = $(this).parents(".accordion");

      if ($(this).next(".acc-content").is(":visible")) {
        //return false;
        $(this).removeClass("active");
        $(this).next(".acc-content").slideUp(300);
        $(outerBox).children(".accordion").removeClass("active-block");
      } else {
        $(outerBox).find(".accordion .acc-btn").removeClass("active");
        $(this).addClass("active");
        $(outerBox).children(".accordion").removeClass("active-block");
        $(outerBox).find(".accordion").children(".acc-content").slideUp(300);
        target.addClass("active-block");
        $(this).next(".acc-content").slideDown(300);
      }
    });
  }


// Contact Form
    var form = $('.contact__form'),
        message = $('.contact__msg'),
        form_data;
    // success function
    function done_func(response) {
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        form.find('input:not([type="submit"]), textarea').val('');
    }
    // fail function
    function fail_func(data) {
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
    form.submit(function (e) {
        e.preventDefault();
        form_data = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form_data
        })
        .done(done_func)
        .fail(fail_func);
    });
    
//navigation bar
document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.querySelector('.navbar-toggler'); // The burger menu button
    const navbarCollapse = document.querySelector('.navbar-collapse'); // The dropdown menu
    const menuItems = document.querySelectorAll('.navbar-nav .nav-link'); // The individual menu items

    // Add click event to the burger menu toggler
    toggler.addEventListener('click', function () {
        this.classList.toggle('collapsed'); // Toggle cross and bars animation
    });

    // Add click events to each menu item
    menuItems.forEach(function (item) {
        item.addEventListener('click', function () {
            // Collapse the menu dropdown
            const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                toggle: false,
            });
            bsCollapse.hide();

            // Reset the burger menu to 3 bars
            if (toggler.classList.contains('collapsed')) {
                toggler.classList.remove('collapsed');
            }
        });
    });
});



//video modal
// function openVideoModal() {
//     document.getElementById('videoModal').style.display = 'flex';
//     document.getElementById('localVideo').play();
//     document.querySelector('.navbar').classList.add('navbar-hidden');
// }

// function closeVideoModal() {
//     var video = document.getElementById('localVideo');
//     video.pause();
//     video.currentTime = 0;
//     document.getElementById('videoModal').style.display = 'none';
//     document.querySelector('.navbar').classList.remove('navbar-hidden');
// }

function toggleForm() {
    const form = document.getElementById("contactForm");
    form.style.display = form.style.display === "none" ? "block" : "none";
}

function toggleDescription1() {
    const description1 = document.getElementById('restaurant-description');
    description1.classList.toggle('show');
}

function toggleDescription2() {
    const description2 = document.getElementById('mall-description');
    description2.classList.toggle('show');
}

function toggleDescription3() {
    const description3 = document.getElementById('school-description');
    description3.classList.toggle('show');
}

function toggleDescription4() {
    const description4 = document.getElementById('recreation-description');
    description4.classList.toggle('show');
}

function toggleDescription5() {
    const description5 = document.getElementById('hospital-description');
    description5.classList.toggle('show');
}

function toggleDescription6() {
    const description6 = document.getElementById('accessibility-description');
    description6.classList.toggle('show');
}

function toggleDescription7() {
    const description6 = document.getElementById('luxurious-description');
    description6.classList.toggle('show');
}

function toggleDescription8() {
    const description6 = document.getElementById('construction-description');
    description6.classList.toggle('show');
}

function toggleDescription9() {
    const description6 = document.getElementById('location-description');
    description6.classList.toggle('show');
}

function toggleDescription10() {
    const description6 = document.getElementById('security-description');
    description6.classList.toggle('show');
}

function toggleDescription11() {
    const description6 = document.getElementById('customization-description');
    description6.classList.toggle('show');
}

function toggleDescription12() {
    const description6 = document.getElementById('quarters-description');
    description6.classList.toggle('show');
}

function toggleArrow1() {
    const arrow1 = document.getElementById('drop-arrow1');
    arrow1.classList.toggle('rotate');
}

function toggleArrow2() {
    const arrow2 = document.getElementById('drop-arrow2');
    arrow2.classList.toggle('rotate');
}

function toggleArrow3() {
    const arrow3 = document.getElementById('drop-arrow3');
    arrow3.classList.toggle('rotate');
}

function toggleArrow4() {
    const arrow4 = document.getElementById('drop-arrow4');
    arrow4.classList.toggle('rotate');
}

function toggleArrow5() {
    const arrow5 = document.getElementById('drop-arrow5');
    arrow5.classList.toggle('rotate');
}

function toggleArrow6() {
    const arrow6 = document.getElementById('drop-arrow6');
    arrow6.classList.toggle('rotate');
}

function toggleArrow7() {
    const arrow7 = document.getElementById('drop-arrow7');
    arrow7.classList.toggle('rotate');
}

function toggleArrow8() {
    const arrow8 = document.getElementById('drop-arrow8');
    arrow8.classList.toggle('rotate');
}

function toggleArrow9() {
    const arrow9 = document.getElementById('drop-arrow9');
    arrow9.classList.toggle('rotate');
}

function toggleArrow10() {
    const arrow10 = document.getElementById('drop-arrow10');
    arrow10.classList.toggle('rotate');
}

function toggleArrow11() {
    const arrow11 = document.getElementById('drop-arrow11');
    arrow11.classList.toggle('rotate');
}

function toggleArrow12() {
    const arrow12 = document.getElementById('drop-arrow12');
    arrow12.classList.toggle('rotate');
}

document.getElementById('mortgage-form').addEventListener('submit', function (event) {
    event.preventDefault();
    
    const propertyPrice = parseFloat(document.getElementById('property-price').value) || 0;
    const loanPeriod = parseFloat(document.getElementById('loan-period').value) || 0;
    const interestRate = parseFloat(document.getElementById('interest-rate').value) || 0;
    const downPayment = parseFloat(document.getElementById('down-payment').value) || 0;

    const loanAmount = propertyPrice - (propertyPrice * downPayment / 100);
    const monthlyRate = interestRate / 100 / 12;
    const numPayments = loanPeriod * 12;

    const monthlyPayment = (loanAmount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -numPayments));

    document.getElementById('monthly-payment').textContent = `KES ${monthlyPayment.toFixed(2)}`;
});

document.getElementById('toggle-calculator').addEventListener('click', function () {
    const calculator = document.getElementById('mortgage-calculator');
    const isHidden = calculator.style.display === 'none';

    // Toggle visibility
    if (isHidden) {
        calculator.style.display = 'block';
    } else {
        calculator.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggle-calculator');
    const calculatorSection = document.getElementById('mortgage-calculator');
    const closeButton = document.getElementById('close-calculator');
    const buttonContainer = document.getElementById('calculator-button-container');
    const arrowContainer = document.querySelector('.arrow-container');
    const bankSelection = document.getElementById('bank-selection');
    const interestRateInput = document.getElementById('interest-rate');
    const loanPeriodInput = document.getElementById('loan-period');

    // Bank data
    const bankData = {
        equity: { rate: 14.5, period: 15 },
        kcb: { rate: 13.0, period: 20 },
        stanchart: { rate: 12.5, period: 10 },
        coop: { rate: 14.0, period: 18 },
    };

    // Show calculator and hide button
    toggleButton.addEventListener('click', function () {
        calculatorSection.classList.remove('hide');
        toggleButton.style.opacity = '0';
        setTimeout(() => {
            buttonContainer.style.display = 'none';
            calculatorSection.classList.add('show');
            calculatorSection.style.display = 'block';
            arrowContainer.classList.add('show');
        }, 300);
    });

    // Hide calculator and show button
    closeButton.addEventListener('click', function () {
        calculatorSection.classList.remove('show');
        calculatorSection.classList.add('hide');
        arrowContainer.classList.remove('show');
        setTimeout(() => {
            calculatorSection.style.display = 'none';
            buttonContainer.style.display = 'block';
            toggleButton.style.opacity = '1';
        }, 600);
    });

    // Populate interest rate and loan period when a bank is selected
    bankSelection.addEventListener('change', function () {
        const selectedBank = bankSelection.value;
        if (bankData[selectedBank]) {
            interestRateInput.value = bankData[selectedBank].rate;
            loanPeriodInput.value = bankData[selectedBank].period;
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // List of IDs to target
    const targetSlides = ["bg-img-home2","bg-img-home4"];

    const updateBackgroundImages = () => {
        const screenWidth = window.innerWidth;

        targetSlides.forEach((slideId) => {
            const slide = document.getElementById(slideId);

            if (slide) {
                const baseImagePath = slide.getAttribute("data-base-image"); // Base image path
                let imagePath;

                if (screenWidth <= 600) {
                    // Mobile image (3:4 aspect ratio)
                    imagePath = baseImagePath.replace(".webp", "-mobile.webp");
                } else if (screenWidth > 600 && screenWidth <= 1024) {
                    // Tablet image (4:3 aspect ratio)
                    imagePath = baseImagePath.replace(".webp", "-tablet.webp");
                } else {
                    // Desktop image (16:9 aspect ratio)
                    imagePath = baseImagePath;
                }

                // Update the data-background attribute and apply background
                if (imagePath) {
                    slide.setAttribute("data-background", imagePath);
                    slide.style.backgroundImage = `url(${imagePath})`;
                } else {
                    console.error(`Image path is undefined for slide: ${slideId}`);
                }
            } else {
                console.error(`Slide with ID ${slideId} not found.`);
            }
        });
    };

    // Call the function on page load and resize
    updateBackgroundImages();
    window.addEventListener("resize", updateBackgroundImages);
});

document.addEventListener("DOMContentLoaded", () => {
    // Contact form elements
    const contactButton = document.getElementById("contact-button");
    const contactTitle = document.getElementById("contact-title");
    const contactForm = document.getElementById("contact-form");

    let formVisible = false;

    // Toggle form visibility and move elements
    contactButton.addEventListener("click", () => {
        formVisible = !formVisible;
        if (formVisible) {
            contactButton.classList.add("moved");
            contactTitle.classList.add("moved");
            contactForm.classList.add("visible");
            contactButton.textContent = "Close Form";
        } else {
            contactButton.classList.remove("moved");
            contactTitle.classList.remove("moved");
            contactForm.classList.remove("visible");
            contactButton.textContent = "Get in Touch";
        }
    });

    // Handle form submission
    contactForm.addEventListener("submit", (event) => {
        event.preventDefault();

        // Reset the form after a short delay
        setTimeout(() => {
            contactForm.reset(); // Clear form input          
            contactButton.classList.remove("moved");
            contactTitle.classList.remove("moved");
            contactForm.classList.remove("visible");
            contactButton.textContent = "Get in Touch";
        }, 500); // Delay for 0.5 seconds
    });
    

    // Button click/touch styling logic
    const buttons = document.querySelectorAll(".contact-button, .message-button, .calculate-btn");

    buttons.forEach(button => {
        // Add event listener for click (desktop)
        button.addEventListener("click", () => {
            button.classList.add("clicked");

            // Remove the clicked class after 0.5s to revert to the original state
            setTimeout(() => {
                button.classList.remove("clicked");
            },500);
        });

        // Add event listener for touchend (mobile/touch devices)
        button.addEventListener("touchend", () => {
            button.classList.add("clicked");

            // Remove the clicked class after 0.5s to revert to the original state
            setTimeout(() => {
                button.classList.remove("clicked");
            }, 500);
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    document.querySelectorAll('.owl-dot').forEach((dot, index) => {
      dot.setAttribute('aria-label', 'Go to slide ' + (index + 1));
    });
  }, 300);
});

document.addEventListener("DOMContentLoaded", function () {

    // MAIN POPUP
    const cookiePopup = document.getElementById("cookiePopup");

    // SETTINGS POPUP
    const cookieSettings = document.getElementById("cookieSettings");

    // BUTTONS
    const acceptBtn = document.getElementById("acceptCookies");
    const rejectBtn = document.getElementById("rejectCookies");
    const saveBtn = document.getElementById("saveSettings");

    // SETTINGS LINK
    const preferencesLink = document.getElementById("openCookieSettings");

    // COOKIE OPTIONS
    const functional = document.getElementById("functionalCookies");
    const analytics = document.getElementById("analyticsCookies");
    const marketing = document.getElementById("marketingCookies");

    // SAFETY CHECK
    if (!cookiePopup || !cookieSettings) return;

    // ALWAYS HIDE POPUPS INITIALLY
    cookiePopup.style.display = "none";
    cookieSettings.style.display = "none";

    // CHECK SAVED CONSENT
    const savedConsent = localStorage.getItem("cookieConsent");

    // SHOW POPUP ONLY IF NO CONSENT EXISTS
    if (!savedConsent) {

        setTimeout(() => {
            cookiePopup.style.display = "flex";
        }, 500);

    }

    // ACCEPT ALL
    if (acceptBtn) {

        acceptBtn.addEventListener("click", function () {

            const consent = {
                functional: true,
                analytics: true,
                marketing: true,
                thirdParty: true
            };

            localStorage.setItem(
                "cookieConsent",
                JSON.stringify(consent)
            );

            cookiePopup.style.display = "none";
        });

    }

    // REJECT ALL
    if (rejectBtn) {

        rejectBtn.addEventListener("click", function () {

            const consent = {
                functional: false,
                analytics: false,
                marketing: false,
                thirdParty: false
            };

            localStorage.setItem(
                "cookieConsent",
                JSON.stringify(consent)
            );

            cookiePopup.style.display = "none";
        });

    }

    // OPEN SETTINGS
    if (preferencesLink) {

        preferencesLink.addEventListener("click", function (e) {

            e.preventDefault();

            cookiePopup.style.display = "none";

            cookieSettings.style.display = "flex";

        });

    }

    // SAVE SETTINGS
    if (saveBtn) {
        saveBtn.addEventListener("click", function () {
            const consent = {
                functional: functional ? functional.checked : false,
                analytics: analytics ? analytics.checked : false,
                marketing: marketing ? marketing.checked : false,
                thirdParty: true
            };
            localStorage.setItem(
                "cookieConsent",
                JSON.stringify(consent)
            );

            cookieSettings.style.display = "none";
        });
    }
});

window.addEventListener('scroll', () => {
    const article = document.body.scrollHeight - window.innerHeight;
    const progress = (window.scrollY / article) * 100;

    document.querySelector('.reading-progress').style.width =
        progress + '%';
});


const seoTitle = document.querySelector('input[maxlength="60"]');

const seoDescription = document.querySelector('textarea[maxlength="160"]');

const seoTitleCount = document.getElementById('seoTitleCount');

const seoDescriptionCount = document.getElementById('seoDescriptionCount');

seoTitle.addEventListener('input', () => {
    seoTitleCount.innerHTML =
    seoTitle.value.length + " / 60";
});

seoDescription.addEventListener('input', () => {
    seoDescriptionCount.innerHTML =
    seoDescription.value.length + " / 160";
});


const tableModal = document.getElementById('tableModal');

document
.getElementById('insertTable')
.addEventListener('click', () => {
    tableModal.style.display = 'flex';
});

document
.getElementById('generateTable')
.addEventListener('click', () => {
    const rows =
    document.getElementById('tableRows').value;

    const cols =
    document.getElementById('tableCols').value;

    let tableHTML =
        '<table><thead><tr>';

    for(let i = 1; i <= cols; i++){
        tableHTML +=
        '<th>Heading ' + i + '</th>';
    }

    tableHTML +=
    '</tr></thead><tbody>';

    for(let r = 1; r <= rows; r++){
        tableHTML += '<tr>';
        for(let c = 1; c <= cols; c++){
            tableHTML += '<td>Data</td>';
        }
        tableHTML += '</tr>';
    }

    tableHTML += '</tbody></table>';

    insertAtCursor(tableHTML);
    tableModal.style.display = 'none';
});

document
.getElementById('featuredImage')
.addEventListener('change', function(){
    const file =
    this.files[0];

    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(e){
        document
        .getElementById('previewImage')
        .src = e.target.result;

        document
        .getElementById('previewImage')
        .style.display = 'block';

        document
        .getElementById('previewText')
        .style.display = 'none';
    }
    reader.readAsDataURL(file);
});


const editor = document.querySelector('.article-content-editor');
document
.getElementById('insertH2')
.addEventListener('click', function(){
    editor.value += `
<h2>Section Heading</h2>
`;
});

document
.getElementById('insertH3')
.addEventListener('click', function(){
    editor.value += `
<h3>Subheading</h3>
`;
});

document
.getElementById('insertQuote')
.addEventListener('click', function(){
    editor.value += `
<div class="article-quote">
Important insight goes here.
</div>
`;
});

document
.getElementById('insertList')
.addEventListener('click', function(){
    editor.value += `
<ul>
    <li>Point One</li>
    <li>Point Two</li>
    <li>Point Three</li>
</ul>
`;
});


const titleInput =
document.getElementById('articleTitle');

const categoryInput =
document.getElementById('articleCategory');

const contentInput =
document.getElementById('articleContent');

const previewTitle =
document.getElementById('previewTitle');

const previewCategory =
document.querySelector('.preview-category');

const previewContent =
document.getElementById('previewContent');

titleInput.addEventListener('input', () => {
    previewTitle.innerHTML =
    titleInput.value ||
    'Article Title Preview';
});

categoryInput.addEventListener('change', () => {
    previewCategory.innerHTML =
    categoryInput.value;
});

contentInput.addEventListener('input', () => {
    previewContent.innerHTML =
    contentInput.innerHTML;
});


function insertAtCursor(html) {
    const selection = window.getSelection();

    if (!selection.rangeCount) return;
    const range = selection.getRangeAt(0);

    range.deleteContents();

    const temp = document.createElement('div');
    temp.innerHTML = html;

    const fragment = document.createDocumentFragment();

    let node;
    while ((node = temp.firstChild)) {
        fragment.appendChild(node);
    }
    range.insertNode(fragment);
}

document
.getElementById('insertH2')
.addEventListener('click', () => {
    insertAtCursor(`
        <h2>
            Section Heading
        </h2>
    `);
});

document
.getElementById('insertH3')
.addEventListener('click', () => {
    insertAtCursor(`
        <h3>
            Subheading
        </h3>
    `);
});


document
.getElementById('insertQuote')
.addEventListener('click', () => {
    insertAtCursor(`
        <div class="article-quote">

            Important insight goes here.

        </div>
    `);
});


document
.getElementById('insertList')
.addEventListener('click', () => {
    insertAtCursor(`
        <ul>
            <li>Point One</li>
            <li>Point Two</li>
            <li>Point Three</li>
        </ul>
    `);
});









