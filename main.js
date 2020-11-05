let $$$ = (ele) => document.querySelector(ele);
 
function signin_display(){
    let sup = $$$('.signup-form');
    let sin = $$$('.signin-form');
    if(sup.classList.contains('open')){
        sup.classList.remove('open');
        sup.style.display = 'none';
    }
    sin.classList.add('open');
    sin.style.display = 'flex';
    // console.log(sin.classList);
}
function signup_display(){
    let sup = $$$('.signup-form');
    let sin = $$$('.signin-form');
    if(sin.classList.contains('open')){
        sin.classList.remove('open');
        sin.style.display = 'none';
    }
    // console.log(sup);
    sup.style.display = 'flex';
    sup.classList.add('open');
}
function advanced_search(){
    let adv = $$$('.adv-search');
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
    let adv = $$$('.adv-search');
    if(adv.classList.contains('open')){
        adv.classList.remove('open');
        adv.style.display = 'none';
        return;
    }
}
function userview_display(tf){
    let def = $$$('.default-search');
    let user = $$$('.user-search');
    let advgo = $$$('.advanced-search');
    if(tf == 1){
        def.style.display = 'none';
        def.classList.add('close');
        if(advgo){
            advgo.style.display = 'none';
            if(!advgo.classList.contains('close')){
                advgo.classList.add('close');
            }
        }
        user.style.display = 'block';
        user.classList.remove('close');
    }
    else{
        def.style.display = 'block';
        def.classList.remove('close');
        user.style.display = 'none';
        user.classList.add('close');
        if(advgo){
            advgo.style.display = 'none';
            if(!advgo.classList.contains('close')){
                advgo.classList.add('close');
            }        
        }
    }
}
function advanced_display(tf){
    let def = $$$('.default-search');
    let user = $$$('.user-search');
    let advgo = $$$('.advanced-search');
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
    let likes = parseInt(e.parentElement.children[1].textContent);
    if(e.style.color == 'blue'){
        e.style.color = 'grey';
        e.parentElement.children[1].textContent = likes - 1;
    }
    else{
        e.style.color = 'blue';
        e.parentElement.children[1].textContent = likes + 1;
    }
}
function flip_eye(){
    let eye = $$$('.eye');
    let pass = $$$('.pass');
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
    let submit = $$$('.ip-submit');
    let read = document.querySelectorAll('.inp-readonly');
    if(tf == 1){
        submit.value = 'Save Changes';
        read.forEach((i)=>{
            if(i.type == 'color'){
                i.removeAttribute('disabled');
            }
            else{
                i.removeAttribute('readonly');
            }
        });
    }
    else{
        submit.value = 'Edit Profile';
        read.forEach((i)=>{
            if(i.type == 'color'){
                i.setAttribute('disabled','disabled');
            }
            else{
                i.setAttribute('readonly','readonly');
            }
        });
    }
}
function profile_click(){
    let my = $$$('.my-bio');
    let user = $$$('.user-bio');
    let chats = $$$('.chats');

    if(!my.classList.contains('open') ){
        my.classList.add('open');
        my.style.display = 'block';
        user.classList.remove('open');
        user.style.display = 'none';
        chats.style.display = 'none';
    }
}
function openchats(tf){
    let chats = $$$('.chats');
    let user = $$$('.user-bio');
    if(tf == 1){
        chats.style.display = 'block';
        user.style.display = 'none';
    }
    else{
        chats.style.display = 'none';
        user.style.display = 'block';
    }
}
function send_opacity(tf = 1){
    let msg = $$$('.chat-msg');
    let text = msg.value ;
    let send = $$$('.chat-send');
    if(text.trim()){
        send.style.opacity = 1;
    }
    else if(tf == 0){
        send.style.opacity = 0.5;
    }
    else{
        send.style.opacity = 0.5;
    }
    // console.log(msg.value);
}