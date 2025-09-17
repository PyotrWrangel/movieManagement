const Logout = document.querySelector("#logoutButton");
if(Logout) {
Logout.addEventListener("click", logout);
}

//fetch utente sloggato
function logout(e) {
e.preventDefault();
fetch("../querys/logout.php")
.then((response) => response.json())
.then(data => {
  if(data.response === 1) {
  document.location.href = "../index.php"
  }
})
.catch (err => console.error("errore nel logout: ", err));
}

// fetch controllo login utente
fetch("checklogged.php")
.then((response) => response.json())
.then(data => {
  console.log('la risposta è', data.response);
  if(!window.location.pathname.endsWith("index.php") && data.response === 0) {
    // console.log('la risposta è', data.response)
    window.location.href = '../index.php';
  }
})
.catch (err => console.error("errore nel controllo login: ", err));