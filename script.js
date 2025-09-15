console.log('script caricato');

const register = document.querySelector("#registerButton");
if (register) {
register.addEventListener("click", generateFormRegister);
}

const Logout = document.querySelector("#logoutButton");
if(Logout) {
Logout.addEventListener("click", logout);
}

//REGISTRAZIONE

function generateFormRegister() {
  const html = document.querySelector("#registerForm").innerHTML = `
                <form id="register" method="post">
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
  if (formRegister) {
  formRegister.addEventListener("submit", addUtente);
  }
}

function addUtente(e) {
  e.preventDefault();
  const form = e.currentTarget;
  console.log(form);
  const fd = new FormData(form);

  fetch("/corsoPhp/phpmysql/movieManagement/querys/register.php", {
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
if(login) {
login.addEventListener("click", generateFormLogin);
}

function generateFormLogin() {
   const html = document.querySelector("#loginForm").innerHTML = `
     <form id="loginUtente" method="POST">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
                <input type="submit" name="login" value="Login">
                </form>
    `;
    const form = document.querySelector("#loginUtente");
    if(form) {
    form.addEventListener("submit", loginUtente);
    }
}

function loginUtente(e) {
  e.preventDefault();
  const formLogin = e.currentTarget;
  console.log(e);
  const fd = new FormData(formLogin);
  console.log(fd);

  fetch ("/corsoPhp/phpmysql/movieManagement/querys/login.php", {
    method: 'POST',
    // headers: {
    //   "Content-type": "application/json",
    // },
    body: fd,
    
  })

      .then((response) => response.json())
      .then(data => {
        console.log("Risposta JSON: ", data.response);

       if(data.response == 1) {
        console.log('entro nella prima condizione');
         document.location.href = './pages/dashboard.php';
       } else {
         console.log('entro nella seconda condizione');
                  document.querySelector("#responseLogin").innerHTML = `
          <p style= " border: solid; border-color: red; background-color: rgba(255, 0, 0, 0.5); padding: 4px; border-radius: 6px;">Email o Password errate</p>`;
        }
      })
  .catch(err => console.error("errore fetch:", err));
}

//fetch controllo utente loggato

fetch("/corsoPhp/phpmysql/movieManagement/pages/dashboard.php")
.then((response) => response.json())
.then(data => {
  if(data.response === 0 && !window.location.pathname.endsWith("index.php")) {
    window.location.href = '/corsoPhp/phpmysql/movieManagement/index.php';
  }
})

//fetch utente sloggato
function logout(e) {
e.preventDefault();
fetch("/corsoPhp/phpmysql/movieManagement/querys/logout.php")
.then((response) => response.json())
.then(data => {
  if(data.response === 1) {
  document.location.href = "/corsoPhp/phpmysql/movieManagement/index.php"
  }
})
.catch (err => console.error("errore fetch: ", err));
}

    //debug risposta grezza
      // .then(res => {
  //   console.log("status", res.status);
  //   return res.text();
  // })
  // .then(txt => console.log("risposta grezza:", txt))

