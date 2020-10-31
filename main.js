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
        adv.style.display = 'none';
        return;
    }
    // console.log(adv);
    adv.style.display= 'block';
    adv.classList.add('open');
}
function clicked_search(){
    let adv = $('.adv-search');
    if(adv.classList.contains('open')){
        adv.classList.remove('open');
        adv.style.display = 'none';
        return;
    }
}
function userview_display(tf){
    let def = $('.default-search');
    let user = $('.user-search');
    let advgo = $('.advanced-search');
    if(tf == 1){
        def.style.display = 'none';
        def.classList.add('close');
        // console.log(adv);
        if(advgo){
            advgo.style.display = 'none';
            advgo.classList.add('close');
        }
        user.style.display = 'block';
        user.classList.remove('close');
    }
    else if(tf == 0){
        def.style.display = 'block';
        def.classList.remove('close');
        user.style.display = 'none';
        user.classList.add('close');
        if(advgo){
            advgo.style.display = 'none';
            advgo.classList.add('close');
        }
    }
}
function advanced_display(tf){
    let def = $('.default-search');
    let user = $('.user-search');
    let advgo = $('.advanced-search');
    if(tf == 1){
        def.style.display = 'none';
        def.classList.add('close');
        user.style.display = 'none';
        user.classList.add('close');
        advgo.style.display = 'block';
        advgo.classList.remove('close');
        return;
    }
    else if(tf == 0){
        def.style.display = 'block';
        def.classList.remove('close');
        user.style.display = 'none';
        user.classList.add('close');
        advgo.style.display = 'none';
        advgo.classList.add('close');
        return;
    }
}
function click_like(e){
    if(e.style.color == 'blue'){
        e.style.color = 'grey';
    }
    else{
        e.style.color = 'blue';
    }
}
function flip_eye(){
    let eye = $('.eye');
    let pass = $('.pass');
    if(eye.classList.contains('fa-eye-slash')){
        eye.classList.remove('fa-eye-slash');
        eye.classList.add('fa-eye');
        pass.type = 'text';
    }
    else{
        eye.classList.remove('fa-eye');
        eye.classList.add('fa-eye-slash');
        pass.type = 'password';
    }
}
function edit_save(tf){
    let submit = $('.ip-submit');
    let read = document.querySelectorAll('.inp-readonly');
    if(tf == 1){
        submit.value = 'Save Changes';
        read.forEach((i)=>{
            i.removeAttribute('readonly');
        });
    }
    else{
        submit.value = 'Edit Profile';
        read.forEach((i)=>{
            i.setAttribute('readonly','readonly');
        });
    }
}
// function edit(){
//     let text = $('.tt');
//     let i = $('i');
//     if(text.getAttribute('readonly')){
//         text.removeAttribute('readonly');
//         // console.log("ysssssssssss");
//         text.style.color = 'red';
//         i.style.color = 'red';
//     }
//     else{
//         text.setAttribute('readonly','readonly');
//         text.style.color = 'black';
//         i.style.color = 'black';


//     }
// }
