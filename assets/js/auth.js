document.getElementById('submit-auth').addEventListener('click',(ev)=>{
    let username = document.getElementsByName('username')[0].value.trim()
    let password = document.getElementsByName('password')[0].value.trim()

    if (username==''){
        document.getElementById('username-err').innerText = 'لظفا نام کاربری معتبر وارد کنید.';
        return 0;
    }

    if (password==''){
        document.getElementById('password-err').innerText = 'لظفا نام رمز عبور معتبر وارد کنید.';
        return 0;
    }
    
    document.getElementById('auth-form').submit();
})