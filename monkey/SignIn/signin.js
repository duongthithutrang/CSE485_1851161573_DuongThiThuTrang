let form = document.getElementById('form-SignIn')
form.onsubmit = function(e){
    e.preventDefault()

    let signInInfo = {
        email: form.email.value.trim().toLowerCase(),
        pass:  form.pass.value.trim()
    }

    let checkPass = null
    if(!signInInfo.pass){
        checkPass = 'Fill your password'
    }else if(signInInfo.pass.length < 6){
        checkPass = 'At least 6 characters'
    }

    let validateResult = [
        utils.Validate(signInInfo.email, '#email-error', 'Fill your email address'),

        utils.Validate(signInInfo.pass && signInInfo.pass.length >= 6, '#pass-error', checkPass)
    ]
    
    if(utils.allPassed(validateResult)){
        controller.signIn(signInInfo)
    }

}