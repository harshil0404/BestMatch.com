let $ = (ele) => document.querySelector(ele);

function signin_display(){
    let sup = $('.signup-form');
    let sin = $('.signin-form');
    if(sup.classList.contains('open')){
        sup.classList.remove('open');
        sup.style.display = 'none';
    }
    sin.classList.add('open');
    sin.style.display = 'flex';
    // console.log(sin.classList);
}
function signup_display(){
    let sup = $('.signup-form');
    let sin = $('.signin-form');
    if(sin.classList.contains('open')){
        sin.classList.remove('open');
        sin.style.display = 'none';
    }
    // console.log(sup);
    sup.style.display = 'flex';
    sup.classList.add('open');
}
function advanced_search(){
    let adv = $('.adv-search');
    if(adv.classList.contains('open')){
        adv.classList.remove('open');
        adv.style.transform= 'scale(0)';
        return;
    }
    console.log(adv);
    adv.style.transform= 'scale(1)';
    adv.classList.add('open');
}
function clicked_search(){
    let adv = $('.adv-search');
    if(adv.classList.contains('open')){
        adv.classList.remove('open');
        adv.style.transform= 'scale(0)';
        return;
    }
}