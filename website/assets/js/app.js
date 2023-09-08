let firstName = document.getElementById('username')
let lastName = document.getElementById('lastname')
let email = document.getElementById('email')
let password = document.getElementById('password')
let signUp = document.getElementById('signup')

signUp.addEventListener('submit', function (event) {
    event.preventDefault
    if (!firstName) {
        document.getElementById("username").style = "border:1px solid red"
        document.getElementById("errorFirstName").style = "color:red"
        document.getElementById("errorFirstName").innerHTML = "Please fill out this field!"
    }
    if (!lastName) {
        document.getElementById("lastname").style = "border:1px solid red"
        document.getElementById("errorLastName").style = "color:red"
        document.getElementById("errorLastName").innerHTML = "Please fill out this field!"
    }
    if (!email) {
        document.getElementById("email").style = "border:1px solid red"
        document.getElementById("errorEmail").style = "color:red"
        document.getElementById("errorEmail").innerHTML = "Please fill out this field!"
    }
    if (!password) {
        document.getElementById("password").style = "border:1px solid red"
        document.getElementById("errorPassword").style = "color:red"
        document.getElementById("errorPassword").innerHTML = "Please fill out this field!"
    }
})

firstName.addEventListener('input', function (event) {
    event.preventDefault
    let firstName = document.getElementById('username').value
    let nameRejax = /^[A-Za-z]{3,}$/
    if (!firstName) {
        document.getElementById("username").style = "border:1px solid red"
        document.getElementById("errorFirstName").style = "color:red"
        document.getElementById("errorFirstName").innerHTML = "Please fill out this field!"
    }
    else if (!nameRejax.test(firstName)) {
        document.getElementById("username").style = "border:1px solid red"
        document.getElementById("errorFirstName").style = "color:red"
        document.getElementById("errorFirstName").innerHTML = "Please enter valid name!"
    }
    else {
        document.getElementById("username").style = " "
        document.getElementById("errorFirstName").innerHTML = " "
    }
})


lastName.addEventListener('input', function (event) {
    event.preventDefault
    let lastName = document.getElementById('lastname').value
    let nameRejax = /^[A-Za-z]{3,}$/
    if (!lastName) {
        document.getElementById("lastname").style = "border:1px solid red"
        document.getElementById("errorLastName").style = "color:red"
        document.getElementById("errorLastName").innerHTML = "Please fill out this field!"
    }
    else if (!nameRejax.test(lastName)) {
        document.getElementById("lastname").style = "border:1px solid red"
        document.getElementById("errorLastName").style = "color:red"
        document.getElementById("errorLastName").innerHTML = "Please enter valid name!"
    }
    else {
        document.getElementById("lastname").style = " "
        document.getElementById("errorLastName").innerHTML = " "
    }
})

email.addEventListener('input', function (event) {
    event.preventDefault
    let email = document.getElementById('email').value
    let emailRejax = /^[\w]+@[A-Za-z]{4,5}[.][A-Za-z]{2,}$/
    if (!email) {
        document.getElementById("email").style = "border:1px solid red"
        document.getElementById("errorEmail").style = "color:red"
        document.getElementById("errorEmail").innerHTML = "Please fill out this field!"
    }
    else if (!emailRejax.test(email)) {
        document.getElementById("email").style = "border:1px solid red"
        document.getElementById("errorEmail").style = "color:red"
        document.getElementById("errorEmail").innerHTML = "Please enter valid email!"
    }
    else {
        document.getElementById("email").style = " "
        document.getElementById("errorEmail").innerHTML = " "
    }
})
password.addEventListener('input', function (event) {
    event.preventDefault
    let password = document.getElementById('password').value
    let passwordRejax = /^[\w]{4,}$/
    if (!password) {
        document.getElementById("password").style = "border:1px solid red"
        document.getElementById("errorPassword").style = "color:red"
        document.getElementById("errorPassword").innerHTML = "Please fill out this field!"
    }
    else if (!passwordRejax.test(password)) {
        document.getElementById("password").style = "border:1px solid red"
        document.getElementById("errorPassword").style = "color:red"
        document.getElementById("errorPassword").innerHTML = "use strong password!"
    }
    else {
        document.getElementById("password").style = " "
        document.getElementById("errorPassword").innerHTML = " "
    }
})







