const register = document.querySelector("#registerButton");
register.addEventListener("click", generateFormRegister);

function generateFormRegister() {
  document.querySelector("#registerForm").innerHTML = `
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
