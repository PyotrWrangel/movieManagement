const register = document.querySelector("#registerButton");
register.addEventListener("click", generateFormRegister);

//REGISTRAZIONE

function generateFormRegister() {
  const html = document.querySelector("#registerForm").innerHTML = `
                <form id="register" action="register.php" method="post">
                <label for="userName"> Username: </label>
                <input type="text" name="userName" id="username">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email">
                <label for="password_hash">Password: </label>
                <input type="password" name="password_hash" id="password">
                <button type="submit"> Registrati </button>
                </form>
                `;
  // document.insertAdjacentHTML("afterend", html)
  const formRegister = document.querySelector("#register");
  formRegister.addEventListener("submit", addUtente);
}

function addUtente(e) {
  e.preventDefault();
  const form = e.currentTarget;
  console.log(form);
  const fd = new FormData(form);

  fetch("./querys/register.php", {
    method: "POST",
    header: {
      "Content-type": "application/json",
    },
    body: fd,
  })
    .then((response) => response.json())
    .catch((error) => {
      console.error("Errore: ", error);
    });
}

//LOGIN

const login = document.querySelector("#loginButton");
login.addEventListener("click", generateFormLogin);

function generateFormLogin() {
   const html = document.querySelector("#loginForm").innerHTML = `
     <form id="loginUtente" action="login.php" method="POST">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password">
                <input type="submit" name="login" value="Login">
                </form>
    `;
    const form = document.querySelector("#loginUtente");
    form.addEventListener("submit", loginUtente);
}

function loginUtente(e) {
  e.preventDefault();
  const formLogin = e.currentTarget;
  console.log(e);
  const fd = new FormData(formLogin);
  console.log(fd);

  fetch ("./querys/login.php", {
    method: 'POST',
    // headers: {
    //   "Content-type": "application/json",
    // },
    body: fd,
    
  })

      .then((response) => response.json())
      .then(data => {
        console.log("Risposta JSON: ", data);

        if(data.response === 1) {
          document.location.href = './pages/dashboard.php';
        } else {
          alert("non reindirizzato");
        }
      })
  .catch(err => console.error("errore fetch:", err));
}

//fetch controllo utente loggato

fetch("./pages/dashboard.php")
.then((response) => response.json())
.then(data => {
  if(data.response === 0) {
    document.location.href = './index.php';
  }
})



    //debug risposta grezza
      // .then(res => {
  //   console.log("status", res.status);
  //   return res.text();
  // })
  // .then(txt => console.log("risposta grezza:", txt))

