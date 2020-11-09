const controller = {
    signUp: async function (signUpInfo) {
        let email = signUpInfo.email
        let password = signUpInfo.pass



        try {
            await firebase.auth().createUserWithEmailAndPassword(email, password)
            // code chỉ chạy đến đây là dừng
            // tu tu o oi
            await firebase.auth().currentUser.updateProfile({
                displayName: `${email}`
            })


            await firebase.auth().currentUser.sendEmailVerification();
            alert('An email verification has been sent to your email')
            window.location.assign('../Sign In/SignIn.html')            
        } catch (error) {
            let message = error.message
            alert(message)
        }
    },
    signIn: async function (signInInfo) {
        let email = signInInfo.email
        let password = signInInfo.pass

        try {
            let result = await firebase.auth().signInWithEmailAndPassword(email, password)
            let user = result.user
            if (user.emailVerified) {
                window.location.assign('../Trang Chủ/Home.html')
            } else {
                throw new Error('Must verify email')
            }
        } catch (error) {
            let message = error.message
            alert(message)
        }
        // utils.setLoadingContent('#btn-sign-in', `Đăng Nhập`)
    }


}