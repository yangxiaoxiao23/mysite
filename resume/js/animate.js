/**
 * Created by us-web on 2014/9/4.
 */

$(function(){

    var oResumeUl = $('#js-resume'),
        oResumeLi = oResumeUl.find('> li');
        oNavUl = $('#js-nav');

    oNavUl.delegate('li', 'click', function(){
        
        var oActiveResumeLi = oResumeLi.eq($(this).index());

        oActiveResumeLi.animate({
            left: 0,
            top: 0,
            opacity: 1
        }, {
            easing: 'easeOutBounce',
            duration: 4000,
            complete:function(){

            }
        });
    })
});
