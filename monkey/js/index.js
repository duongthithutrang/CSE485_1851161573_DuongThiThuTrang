window.onload = init  

function init(){
    firebase.auth().onAuthStateChanged(function(user){
        console.log(user)
        if(user && user.emailVerified){
            myUser.currentUser = user
        } 
    })
}


