const username = document.getElementById('username');
const usernameCheck = document.getElementById('username-check');

const password = document.getElementById('password');
const passwordCheck = document.getElementById('password-check');

const repeatPassword = document.getElementById('repeat_password');
const repeatPasswordCheck = document.getElementById('repeat_password-check');

const email = document.getElementById('email');
const emailCheck = document.getElementById('email-check');

const mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const onlyEnglish = /^[a-z][a-z\d]*$/i;

const setValidateStyle = (input, inputCheck)=>{
    input.classList.add('border-green-success')
    inputCheck.classList.remove('hidden');
    inputCheck.classList.add('block');
}

const setNormalStyle = (input, inputCheck)=>{
    input.classList.add('border-neutral-200')
    inputCheck.classList.remove('block');
    inputCheck.classList.add('hidden');
}

const inputValidate = (input, inputCheck)=>{
    if(input.value.length>=3){
        setValidateStyle(input, inputCheck);
    } else {
        setNormalStyle(input, inputCheck);
    }
}

const emailValidate = (input, inputCheck)=>{
    if(input.value.match(mailFormat)){
        setValidateStyle(input, inputCheck);

    } else {
        setNormalStyle(input, inputCheck);
    }
}

username && username.addEventListener('keyup',function(){
    if(username.value.length>=3 && username.value.match(onlyEnglish)){
        setValidateStyle(username, usernameCheck);
    }else if(username.value.match(mailFormat)){
        setValidateStyle(username, usernameCheck)
    } else {
        setNormalStyle(username, usernameCheck)
    }
});


password && password.addEventListener('keyup', function(){
    inputValidate(password, passwordCheck);
});

repeatPassword && repeatPassword.addEventListener('keyup',function(){
    inputValidate(repeatPassword, repeatPasswordCheck);
})

email && email.addEventListener('keyup',function(){
    emailValidate(email, emailCheck);
})


