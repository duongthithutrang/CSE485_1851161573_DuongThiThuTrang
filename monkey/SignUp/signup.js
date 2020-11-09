let form = document.getElementById('form-signUp')
form.onsubmit = function (event){
    event.preventDefault()

    let signUpInfo = {
        email: form.email.value.trim().toLowerCase(),
        pass: form.pass.value.trim(),
        confirmPass: form.confirmPass.value.trim()
    }

    let checkPass = null
    if(!signUpInfo.pass){
        checkPass = 'Fill your password'
    } else if(signUpInfo.pass.length <6){
        checkPass = 'At least 6 characters'
    }

    let validateResult= [
        utils.Validate(signUpInfo.email,'#email-error', 'Fill your email address'),
        utils.Validate(signUpInfo.pass && signUpInfo.pass.length>=6,'#pass-error',checkPass),
        utils.Validate(signUpInfo.confirmPass == signUpInfo.pass, '#confirm-error', 'Your confirm not match')
    ]

    if(utils.allPassed(validateResult)){
        controller.signUp(signUpInfo)
    }
    
}