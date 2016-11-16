$(document).ready(function() {
    var textarea = document.querySelector('#note_content');

    textarea.addEventListener('keydown', autosize);

    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + (el.scrollHeight + 5) + 'px';
        }, 0);
    }
});

function updateStatus() {

}