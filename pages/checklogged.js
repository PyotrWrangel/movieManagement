const Logout = document.querySelector("#logoutButton");
if(Logout) {
Logout.addEventListener("click", logout);
}

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

// fetch controllo login utente
fetch("./checklogged.js")
.then((response) => response.json())
.then(data => {
  if(!window.location.pathname.endsWith("index.php") && data.response === 0) {
    window.location.href = '/corsoPhp/phpmysql/movieManagement/index.php';
  }
})