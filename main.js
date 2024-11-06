let slideIndex = 0;
showSlides();

function showSlides() {
const iframe = document.getElementById('myIframe');
            iframe.onload = function() {
              iframe.style.height = iframe.contentWindow.document.body.scrollHeight   
           + 'px';
            };
}
function showMarquee() {
}